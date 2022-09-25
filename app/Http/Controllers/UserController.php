<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employment;
use App\Models\NextOfKin;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // $users = User::all();
            $users = User::with(['role', 'employments', 'nextOfKins', 'bankDetails'])->orderBy('created_at', 'desc')->get();

            return response()->json([
                'success' => true,
                'data' => $users,
                'message' => 'User(s) found',
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
     * Get users with search query
     * @param $query
     */

    public function getUser(Request $request){
        try {
            $user = User::where('uuid', '=', $request->user()->uuid)
            ->with(['role', 'employments', 'nextOfKins', 'bankDetails', 'savings', 'loans', 'transactions'])
            ->get();

            return response()->json([
                'success' => true,
                'data' => $user,
                'message' => 'User(s) found',
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
 * path="/get-users",
 * tags={"users"},
 * security={ {"bearer": {} }},
 * @OA\Response(
 *    response=200,
 *    description="Ok"
 *     ),
 * @OA\Response(
 *    response=401,
 *    description="Unauthorized",
 * ),
 * )
 */

    public function getUsers(Request $request)
    {

        try {
           foreach ($request->query() as $key => $value){
               $objKey = $key;
               $objValue = $value;
           }
            //code...
            $users = User::where($objKey, '=', $objValue)
            ->with(['role', 'employments', 'nextOfKins', 'bankDetails', 'savings', 'loans', 'transactions'])
            ->orderBy('created_at', 'desc')
            ->get();

            return response()->json([
               'success' => true,
               'data' => $users,
               'message' => 'User(s) found',
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        // Retrieve the validated input data..
        $validated = $request->safe()->only(['user_id']);

        try {
            // Check if exist in db
            $user = User::where('uuid', $validated['user_id'])->first();

            if(!$user){
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }

            foreach ($request->safe() as $key => $value) {

                if ($value === ''){
                    return response()->json([
                        'success' => false,
                        'message' => "Bad request! $key cannot be empty"
                    ], 400);
                }

                if ($key === 'password'){
                    $user->$key = bcrypt($value);
                    continue;
                }

                $user->$key = $value;
            }

            return response()->json([
                'success' => true,
                'data' => $employment,
                'message' => 'New employment added successfully'
            ], 201);
            
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => Null,
            ], 500);
        }
    }

    public function updateUserKYC(UpdateUserKYCRequest $request)
    {
        // Retrieve the validated input data..
        $validated = $request->safe()->only(['user_id']);

        try {
            // Check if exist in db
            $user = User::where('uuid', $validated['user_id'])->first();

            if(!$user){
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }

            // Destructure foreign keys
            $user_id = $user->id;
            // Property Object (Model)
            $employment = new Employment();
            // Property Object (Model)
            $employment = new Employment();
            $kin = new NextOfKin();

            // Next of kin data collection
            foreach ($request->safe()->only(['firstName', 'lastName', 'phoneNumber', 'relationship', 'nextOfKinAddress', 'nextOfKinState',]) as $key => $value) {
                $kin->$key = $value;
            }

            // Employment data collection
            foreach ($request->safe()->only(['position', 'natureOfBusiness', 'officeAddress', 'officeCity', 'officeState',]) as $key => $value) {
                $employment->$key = $value;
            }

            // Save next of kin
            $kin->uuid = Uuid::uuid4();
            $kin->user_id = $user_id;
            $kin->save();

            // Save employment
            $employment->uuid = Uuid::uuid4();
            $employment->user_id = $user_id;
            $employment->save();

            return response()->json([
                'success' => true,
                'data' => $employment,
                'message' => 'New employment added successfully'
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
                'data' => Null,
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
