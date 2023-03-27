<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\PersonalDataController;

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
