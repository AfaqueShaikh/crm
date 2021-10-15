<?php

use App\Http\Controllers\ApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/get-drivers', [ApiController::class, 'listDrivers']);
Route::post('/login', [ApiController::class, 'login']);
Route::post('/verify-otp', [ApiController::class, 'verifyOtp']);
Route::post('/resend-otp', [ApiController::class, 'resendOtp']);
Route::post('/register', [ApiController::class, 'register']);
Route::get('/get-vehicle-types', [ApiController::class, 'getVehicleTypes']);
Route::post('/search', [ApiController::class, 'search']);
Route::post('/book-ride', [ApiController::class, 'bookRide']);
Route::post('/cancel-trip', [ApiController::class, 'cancelTrip']);
Route::post('/ride-otp', [ApiController::class, 'rideOtp']);
Route::post('/my-bookings', [ApiController::class, 'myBookings']);
Route::post('/user/get-profile', [ApiController::class, 'getUserProfile']);
Route::post('/user/update-profile', [ApiController::class, 'updateUserProfile']);

//driver apis

Route::post('/driver/login', [ApiController::class, 'driverLogin']);
Route::post('/driver/verify-otp', [ApiController::class, 'driverVerifyOtp']);
Route::post('/driver/register', [ApiController::class, 'driverRegister']);
Route::post('/driver/resend-otp', [ApiController::class, 'driverResendOtp']);
Route::post('/driver/vehicle', [ApiController::class, 'driverVehicle']);
Route::get('/vehicle/models', [ApiController::class, 'vehicleModels']);