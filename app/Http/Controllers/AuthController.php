<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreVerifyUserRequest;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\VerifyUser;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use DateTime;

class AuthController extends Controller
{
    private $APP_NAME;

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['register', 'login', 'verifyUser', 'forgotPassword', 'resetPassword']);
        $this->APP_NAME = config('app.name');
    }

    /**
     * Register a new user.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     * @return Illuminate\Http\Response
     */

     /**
 * @OA\Post(
 * path="/register",
 * summary="Sign up", * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"firstName","lastName","middleName","email","password","confirm_password","dob","address","phoneNumber","role"},
 *        @OA\Property(property="firstName", type="string", format="text", example="John"),
 *         @OA\Property(property="lastName", type="string", format="text", example="Dow"),
 *      @OA\Property(property="middleName", type="string", format="text", example="Chi"),
 *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
 *       @OA\Property(property="password_confirmation", type="string", format="password", example="PassWord12345"),
 *       @OA\Property(property="dob", type="string", format="date", example="2022-01-01"),
 *       @OA\Property(property="address", type="string", format="text", example="23, Lekki lagos"),
 *       @OA\Property(property="phoneNumber", type="string", format="number", example="+2347078654632"),
 *       @OA\Property(property="role", type="string", format="text", example="user"),
 *      
 *    ),
 * ),
 * @OA\Response(
 *    response=201,
 *    description="Created",
 *    @OA\JsonContent(
 *       @OA\Property(property="data", type="object",
    *      @OA\Property(
    *              property="user", type="object"
    *          ),
 *      ),
 * @OA\Property(property="message", type="string", example="new user created successfully."),
 *  @OA\Property(property="success", type="boolean", example="true"),
 *        ),
 *     ),
 * 
 * @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      ),
 * )
 */
    public function register(RegisterRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->safe()->only('role');

            $role = Role::where('role', $validated['role'])->first();

            if(!$role){
                return response()->json([
                    'success' => false,
                    'message' => 'Role not found'
                ], 404);
            }

            $role_id = $role->id;

            $user = new User();

            foreach ($request->safe() as $key => $value) {
                if ($key === 'role'){
                    continue;
                }

                if ($key === 'password'){
                    $user->$key = bcrypt($value);
                    continue;
                }
                $user->$key = $value;
            }

            $user->uuid = Uuid::uuid4();
            $user->role_id = $role_id;
            $user->is_admin = $role->role === 'super-admin' ? 1 : 0;
            $user->save();

            // Send mail
            $verifyToken = Str::random(6);

            // Log verify user
            $verifyUser = new VerifyUser();
            $verifyUser->uuid = Uuid::uuid4();
            $verifyUser->user_id = $user->id;
            $verifyUser->token = $verifyToken;
            $verifyUser->save();

            // Send mail
            $mailContent = "<h1>Dear $user->firstName $user->lastName</h1>
            <p>Thank you for your interest in $this->APP_NAME</p>
            <p>Please verify your email. Enter the following code: <span style='font-size: 1rem'> $verifyToken<span></p>";

            $emailDAta = [
                'to' => $user->email,
                'fromName' => $this->APP_NAME,
                'subject' => 'Email Verification',
                'mailContent' => $mailContent,
            ];

            $email = $this->sendMail($emailDAta);

            return response()->json([
                'success' => true,
                'data' => $user,
                'message' => 'new user created successfully! Please verify your email'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
        }
    }



  /**
 * @OA\Post(
 * path="/login",
 * summary="Sign in",
 * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"email","password"},
 *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *    description="Ok",
 *    @OA\JsonContent(
 *       @OA\Property(property="data", type="object",
    *      @OA\Property(
    *              property="user", type="object"
    *          ),
    *        @OA\Property(
    *              property="accessToken", type="string"
    *          ),
 *      ),
 *       @OA\Property(property="message", type="string", example="Login successfully."),
 *  @OA\Property(property="success", type="boolean", example="true"),
 *        ),
 *     ),
 * 
 * @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *      ),
 * )
 */
    public function login(LoginRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->validated();
            // Check email
            $user = User::where('email', $validated['email'])->first();
            // Check password
            if(!$user || !Hash::check($validated['password'], $user->password)){
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid email or password',
                ], 401);
            }

            // Check if verified
            if(!$user->is_verified){
                return response()->json([
                    'success' => false,
                    'message' => 'Please verify your email',
                ], 401);
            }

            $token = $user->createToken('capitalwise')->plainTextToken;

            return response()->json([
                'success' => true,
                'data' => [
                    'user' => $user,
                    'accessToken' => $token,
                ],
                'message' => 'Login successfully.'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
        }
    }

    // Send email to user to reset password
    // NOTE: For security reasons, we send a token to user
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->validated();
            // Check email
            $user = User::where('email', $validated['email'])->first();

            if(!$user){
                return response()->json([
                    'success' => false,
                    'message' => 'User not found',
                    'data' => NULL,
                ], 404);
            }

            $resetToken = Str::random(6);

            // Log verify user
            $verifyUser = new VerifyUser();
            $verifyUser->uuid = Uuid::uuid4();
            $verifyUser->user_id = $user->id;
            $verifyUser->token = $resetToken;
            $verifyUser->save();

            // Send mail
            $mailContent = "<h1>Dear $user->firstName $user->lastName</h1>
            <p>Thank you for your interest in $this->APP_NAME</p>
            <p>Please enter the following code to reset your password: <span style='font-size: 1rem'>$resetToken</span></p>";

            $emailDAta = [
                'to' => $user->email,
                'fromName' => $this->APP_NAME,
                'subject' => 'Reset Password',
                'mailContent' => $mailContent,
            ];

            $email = $this->sendMail($emailDAta);

            return response()->json([
                'success' => true,
                'data' => Null,
                'message' => 'Please check your email for password reset'
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
        }
    }

    // Reset user password
    // NOTE: This is only required if user forgot password. 
    public function resetPassword(ResetPasswordRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->validated();
            // Check token
            $verifyToken = VerifyUser::where('token', $validated['resetToken'])->first();

            if(!$verifyToken){
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid user',
                    'data' => NULL,
                ], 404);
            }

            // Compare date and time
            $now= new DateTime();
            $dateCreated= new DateTime ($verifyToken->created_at);
            $diff=$now->diff($dateCreated);

            if($diff->days > 0){ // 24hrs expiration
                return response()->json([
                    'success' => false,
                    'message' => 'Link expired',
                    'data' => NULL,
                ], 403);
            }

            $verifyToken->token = Null;
            $verifyToken->is_revoked = 1;
            $verifyToken->save();
            // User
            $user = $verifyToken->user;
            // Hash password
            $user->password = bcrypt($validated['password']);
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Password successfully',
                'data' => NULL,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
        }
    }

    // Veify email
    public function verifyUser(StoreVerifyUserRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->validated();
            // Check token
            $verifyUser = VerifyUser::where('token', $validated['verifyToken'])->first();

            if(!$verifyUser){
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid user',
                    'data' => NULL,
                ], 404);
            }

            // Already verified user
            if($verifyUser->user->is_verified){
                return response()->json([
                    'success' => false,
                    'message' => 'Email verified already',
                    'data' => NULL,
                ], 203);
            }

            // Compare date and time
            $now= new DateTime();
            $dateCreated= new DateTime ($verifyUser->created_at);
            $diff=$now->diff($dateCreated);

            if($diff->days > 0){ // 24hrs expiration
                return response()->json([
                    'success' => false,
                    'message' => 'Link expired',
                    'data' => NULL,
                ], 403);
            }

            $verifyUser->token = Null;
            $verifyUser->is_revoked = 1;
            $verifyUser->save();
            // User verified
            $user = $verifyUser->user;

            $user->is_verified = 1;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Email verified successfully',
                'data' => NULL,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => NULL,
            ], 500);
        }
    }


    /**
 * @OA\Get(
 * path="/logout",
 * summary="Logout",
 * tags={"auth"},
 * security={ {"bearer": {} }},
 * @OA\Response(
 *    response=200,
 *    description="Ok"
 *     ),
 * @OA\Response(
 *    response=401,
 *    description="Unauthorized",
 * )
 * )
 */
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'data' => null,
            'message' => 'Successfully logged out'
        ], 200);
    }

    // Send email to user
    private function sendMail($options)
    {
        
        try {
            $mail = new PHPMailer(true);
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
            $mail->isSMTP();
            $mail->Host = config('app.MAILGUN_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = config('app.MAILGUN_USERNAME');
            $mail->Password = config('app.MAILGUN_PASSWORD');
            $mail->SMTPSecure = 'tls';
            $mail->Port = config('app.MAILGUN_PORT');          // Port->2525
            // Recipient
            $mail->From = "info@$this->APP_NAME.com";
            $mail->FromName = $this->APP_NAME;
            $mail->addReplyTo("info@$this->APP_NAME.com", $this->APP_NAME);
            // Content
            $mail->addAddress($options['to']);
            $mail->isHTML(true);
            $mail->Subject = $options['subject'];
            $mail->Body = $options['mailContent'];
            $mail->send();
            return ['status' => true];
        } catch (\Throwable $th) {
        }
    }
}
