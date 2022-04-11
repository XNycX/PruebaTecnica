<?php

use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//CRUD User
Route::prefix('users')->group(function () {
    Route::get('getAll', [UserController::class, 'getAll']);
    Route::get('getUserById/{id}', [UserController::class, 'getUserById']);
    Route::post('createUser', [TaskController::class, 'createUser']);
    Route::put('updateProfile', [UserController::class, 'updateProfile']);
    Route::delete('removeUser', [UserController::class, 'removeUser']);
});
