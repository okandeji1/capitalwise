<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class RoleController extends Controller
{
    /**
 * @OA\Get(
 * path="/get-roles",
 * tags={"users"},
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //code...
            $role = Role::where('role', '!=', 'super-admin')->get();
            return response()->json([
                'success' => true,
                'data' => $role,
                'message' => 'Role(s) found',
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
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
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */

     /**
 * @OA\Post(
 * path="/add-role",
 * summary="Add role",
 * tags={"users"},
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"role"},
 *       @OA\Property(property="role", type="string", format="text", example="user"),
 *    ),
 * ),
 * @OA\Response(
 *    response=201,
 *    description="Created",
 *    @OA\JsonContent(
 *       @OA\Property(property="data", type="object"),
 *       @OA\Property(property="message", type="string", example="Role created successfully."),
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
    public function store(StoreRoleRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->validated();
            // Save entity
            $role = new Role();
            foreach ($request->safe() as $key => $value) {
                $role->$key = Str::lower($value);
            }
            $role->uuid = Uuid::uuid4();
            $role->save();

            return response()->json([
                'success' => true,
                'data' => $role,
                'message' => 'New role created successfully',
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
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
