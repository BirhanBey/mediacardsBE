<?php

use App\Http\Controllers\ListController;
use App\Http\Controllers\AuthController;
use App\Models\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



// Route::resource('Lists', ListController::class);

// Public routes
// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/lists', [ListController::class, 'index']);
Route::get('/lists/{id}', [ListController::class, 'show']);
Route::get('/lists/search/{name}', [ListController::class, 'search']);
Route::post('/lists', [ListController::class, 'store']);
Route::delete('/lists/{id}', [ListController::class, 'destroy']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::put('/lists/{id}', [ListController::class, 'update']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
