<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\NextOfKinController;
use App\Http\Controllers\SavingsCategoryController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\LoanCategoryController;
use App\Http\Controllers\LoanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth route
Route::prefix('v1/auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/verify-email', [AuthController::class,'verifyUser']);
    Route::post('/forgot-password', [AuthController::class,'forgotPassword']);
    Route::put('/reset-password', [AuthController::class,'resetPassword']);
    Route::get('/logout', [AuthController::class,'logout']);
});

Route::post('/v1/users/add-role', [RoleController::class,'store']);
Route::get('/v1/users/get-roles', [RoleController::class,'index']);

// User routes
Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix' => 'v1/users'
], function () {
    // FIXME: prepare all users routes
    Route::get('/me', [UserController::class,'getUser']);
    Route::get('/get-users', [UserController::class,'index']);
    Route::get('/search', [UserController::class,'getUsers']);
    Route::post('/update-kyc', [UserController::class,'updateUserKYC']);
    Route::patch('/update', [UserController::class,'update']);
});

// Savings
Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix' => 'v1/savings'
], function(){
    // Categories
    Route::post('/add-category', [SavingsCategoryController::class,'store']);
    Route::get('/get-categories', [SavingsCategoryController::class,'index']);

    // Savings
    Route::post('/wallet/save-with-paystack', [SavingController::class,'depositWalletWithPaystack']);
    Route::get('/wallet/verify-with-paystack', [SavingController::class,'verifyWalletWithPaystack']);
    Route::get('/wallet/paystack-webhook', [SavingController::class,'paystackWebHook']);
    Route::get('/make-withdrawal-request', [SavingController::class,'withdrawalRequest']);
});

// Loans
Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix' => 'v1/loans'
], function(){
    // Categories
    Route::post('/add-category', [LoanCategoryController::class,'store']);
    Route::get('/get-categories', [LoanCategoryController::class,'index']);

    // Savings
    Route::post('/get-loans', [LoanController::class,'index']);
    Route::get('/loan-request', [LoanController::class,'store']);
});
