<?php

use App\Http\Controllers\AddressController;
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
    Route::post('createUser', [UserController::class, 'createUser']);
    Route::put('updateUserById/{id}', [UserController::class, 'updateUserById']);
    Route::delete('removeUserById/{id}', [UserController::class, 'removeUserById']);
});

//CRUD Address
Route::prefix('addresses')->group(function () {
    Route::get('getAll', [AddressController::class, 'getAll']);
    Route::get('getAddressById/{id}', [AddressController::class, 'getAddressById']);
    Route::post('createAddress', [AddressController::class, 'createAddress']);
    Route::put('updateAddressById/{id}', [AddressController::class, 'updateAddressById']);
    Route::delete('removeAddressById/{id}', [AddressController::class, 'removeAddressById']);
});

