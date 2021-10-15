<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleColorController;
use App\Http\Controllers\VehicleModelController;
use App\Http\Controllers\VehicleModelTypeController;
use App\Http\Controllers\VehicleTypeController;

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/login', [UserController::class, 'adminLogin']);
Route::post('/login', [UserController::class, 'postAdminLogin']);


//admin routes

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);

Route::get('/admin/admin-users/list', [AdminController::class, 'list']);
Route::get('/admin/admin-users/add', [AdminController::class, 'add']);
Route::post('/admin/admin-users/add', [AdminController::class, 'postAdd']);
Route::get('/admin/admin-users/edit/{id}', [AdminController::class, 'update']);
Route::post('/admin/admin-users/edit/{id}', [AdminController::class, 'postUpdate']);
Route::get('/admin/admin-users/delete/{id}', [AdminController::class, 'delete']);

// vehicle types
Route::get('/admin/vehicle-types/list', [VehicleTypeController::class, 'list']);
Route::get('/admin/vehicle-types/add', [VehicleTypeController::class, 'add']);
Route::post('/admin/vehicle-types/add', [VehicleTypeController::class, 'postAdd']);
Route::get('/admin/vehicle-types/edit/{id}', [VehicleTypeController::class, 'update']);
Route::post('/admin/vehicle-types/edit/{id}', [VehicleTypeController::class, 'postUpdate']);
Route::get('/admin/vehicle-types/delete/{id}', [VehicleTypeController::class, 'delete']);


// vehicle models 

Route::get('/admin/vehicle-models/list', [VehicleModelController::class, 'list']);
Route::get('/admin/vehicle-models/add', [VehicleModelController::class, 'add']);
Route::post('/admin/vehicle-models/add', [VehicleModelController::class, 'postAdd']);
Route::get('/admin/vehicle-models/edit/{id}', [VehicleModelController::class, 'update']);
Route::post('/admin/vehicle-models/edit/{id}', [VehicleModelController::class, 'postUpdate']);
Route::get('/admin/vehicle-models/delete/{id}', [VehicleModelController::class, 'delete']);

// vehicle model types 

Route::get('/admin/vehicle-model-types/list', [VehicleModelTypeController::class, 'list']);
Route::get('/admin/vehicle-model-types/add', [VehicleModelTypeController::class, 'add']);
Route::post('/admin/vehicle-model-types/add', [VehicleModelTypeController::class, 'postAdd']);
Route::get('/admin/vehicle-model-types/edit/{id}', [VehicleModelTypeController::class, 'update']);
Route::post('/admin/vehicle-model-types/edit/{id}', [VehicleModelTypeController::class, 'postUpdate']);
Route::get('/admin/vehicle-model-types/delete/{id}', [VehicleModelTypeController::class, 'delete']);


// vehicle model types 

Route::get('/admin/vehicle-colors/list', [VehicleColorController::class, 'list']);
Route::get('/admin/vehicle-colors/add', [VehicleColorController::class, 'add']);
Route::post('/admin/vehicle-colors/add', [VehicleColorController::class, 'postAdd']);
Route::get('/admin/vehicle-colors/edit/{id}', [VehicleColorController::class, 'update']);
Route::post('/admin/vehicle-colors/edit/{id}', [VehicleColorController::class, 'postUpdate']);
Route::get('/admin/vehicle-colors/delete/{id}', [VehicleColorController::class, 'delete']);


// Services 

Route::get('/admin/services/list', [ServiceController::class, 'list']);
Route::get('/admin/services/add', [ServiceController::class, 'add']);
Route::post('/admin/services/add', [ServiceController::class, 'postAdd']);
Route::get('/admin/services/edit/{id}', [ServiceController::class, 'update']);
Route::post('/admin/services/edit/{id}', [ServiceController::class, 'postUpdate']);
Route::get('/admin/services/delete/{id}', [ServiceController::class, 'delete']);
