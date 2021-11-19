<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientsController;
use GuzzleHttp\Middleware;
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

Route::POST('/login', [AuthController::class, 'login']);
Route::POST('/register', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::GET('/patients',[PatientsController::class,'index']);
    Route::POST('/patients',[PatientsController::class,'store']);
    Route::GET('/patients/{id}',[PatientsController::class,'show']);
    Route::PUT('/patients/{id}',[PatientsController::class,'update']);
    Route::DELETE('/patients/{id}',[PatientsController::class,'destroy']);
    Route::GET('/patients/search/{name}',[PatientsController::class,'search']);
    Route::GET('/patients/status/positive',[PatientsController::class,'positive']);
    Route::GET('/patients/status/recovered',[PatientsController::class,'recovered']);
    Route::GET('/patients/status/dead',[PatientsController::class,'dead']);
    Route::GET('/patients/status/{status}',[PatientsController::class,'status']);
    Route::POST('/logout', [AuthController::class, 'logout']);
});