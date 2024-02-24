<?php

use App\Http\Controllers\Api\Admin\Booking\BookingController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegistrationController::class,'store']);
Route::post('login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth.jwt:api']], function () {
    Route::post('login/auth/check', [AuthController::class, 'auth_check']);
    Route::get('logout', [AuthController::class, 'logout']);

    # Booking Operation
    Route::post('booking/store', [BookingController::class,'store']);
    Route::post('booking/list', [BookingController::class, 'list']);
    Route::post('booking/delete', [BookingController::class, 'delete']);

});
