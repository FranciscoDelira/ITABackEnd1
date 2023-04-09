<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\PersonalDataController;
use App\Http\Controllers\MaintenanceRequestController;



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


Route::get('/showToken',[PersonalDataController::class,'showToken']);

//PERSONAL DATA
Route::post('/personalData_store',[PersonalDataController::class, 'store']);
Route::post('/personalData_update/{id}',[PersonalDataController::class,'update']);
Route::delete('/personalData_destroy/{id}',[PersonalDataController::class, 'destroy']);
Route::get('/personalData_show/{id}',[PersonalDataController::class, 'show']);
Route::get('/personalData_index',[PersonalDataController::class, 'index']);

//User
Route::post('/user_register',[UserController::class, 'register']);
Route::get('/user_show/{id}',[UserController::class, 'show']);
Route::post('/user_update/{id}',[UserController::class,'update']);
Route::delete('/user_destroy/{id}',[UserController::class, 'destroy']);
Route::get('/user_index',[UserController::class, 'index']);
Route::post('/login', [UserController::class, 'login']);

//Maintenance Request
Route::get('/maintenance_index',[MaintenanceRequestController::class, 'index']);
Route::post('/maintenance_store',[MaintenanceRequestController::class, 'store']);
Route::get('/maintenance_show/{id}',[MaintenanceRequestController::class, 'show']);
Route::post('/maintenance_update/{id}',[MaintenanceRequestController::class,'update']);
Route::delete('/maintenance_destroy/{id}',[MaintenanceRequestController::class, 'destroy']);