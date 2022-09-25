<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSavingsCategoryRequest;
use App\Http\Requests\UpdateSavingsCategoryRequest;
use App\Models\SavingsCategory;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;


class SavingsCategoryController extends Controller
{
    /**
 * @OA\Get(
 * path="/get-categories",
 * tags={"savings"},
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $categories = SavingsCategory::all();
            return response()->json([
                'success' => true,
                'data' => $categories,
                'message' => 'category(s) found',
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
 * @OA\Post(
 * path="/add-category",
 * tags={"savings"},
 * @OA\RequestBody(
 *    required=true,
 *    @OA\JsonContent(
 *       required={"category"},
 *       @OA\Property(property="category", type="string", format="text", example="normal"),
 *    ),
 * ),
 * @OA\Response(
 *    response=201,
 *    description="Created",
 *    @OA\JsonContent(
 *       @OA\Property(property="data", type="object"),
 *       @OA\Property(property="message", type="string", example="Category created successfully."),
 *  @OA\Property(property="success", type="boolean", example="true"),
 *        ),
 *     ),
 * 
 * * @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *      ),
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSavingsCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavingsCategoryRequest $request)
    {
        try {
            // Retrieve the validated input data...
            $validated = $request->validated();
            // Save entity
            $category = new SavingsCategory();
            foreach ($request->safe() as $key => $value) {
                $category->$key = Str::lower($value);
            }
            $category->uuid = Uuid::uuid4();
            $category->save();

            return response()->json([
                'success' => true,
                'data' => $category,
                'message' => 'New category created successfully',
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
     * @param  \App\Models\SavingsCategory  $savingsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SavingsCategory $savingsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavingsCategory  $savingsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SavingsCategory $savingsCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSavingsCategoryRequest  $request
     * @param  \App\Models\SavingsCategory  $savingsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSavingsCategoryRequest $request, SavingsCategory $savingsCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavingsCategory  $savingsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavingsCategory $savingsCategory)
    {
        //
    }
}
