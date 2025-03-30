<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\FirstAidController;
 

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['middleware' => ['auth:sanctum', 'cors']], function () {
    Route::get('/vehicles', [VehicleController::class, 'index']);
    Route::post('/vehicles', [VehicleController::class, 'store']);
    Route::get('/vehicles/{id}', [VehicleController::class, 'show']);
    Route::put('/vehicles/{id}', [VehicleController::class, 'update']);
    Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy']);
    
    Route::get('/equipments', [EquipmentController::class, 'index']);
    Route::post('/equipments', [EquipmentController::class, 'store']);
    Route::get('/equipments/{id}', [EquipmentController::class, 'show']);
    Route::put('/equipments/{id}', [EquipmentController::class, 'update']);
    Route::delete('/equipments/{id}', [EquipmentController::class, 'destroy']);
    
    Route::get('/services', [ServiceController::class, 'index']);
    Route::post('/services', [ServiceController::class, 'store']);
    Route::get('/services/{id}', [ServiceController::class, 'show']);
    Route::put('/services/{id}', [ServiceController::class, 'update']);
    Route::delete('/services/{id}', [ServiceController::class, 'destroy']);
    
    Route::get('/insurances', [InsuranceController::class, 'index']);
    Route::post('/insurances', [InsuranceController::class, 'store']);
    Route::get('/insurances/{id}', [InsuranceController::class, 'show']);
    Route::put('/insurances/{id}', [InsuranceController::class, 'update']);
    Route::delete('/insurances/{id}', [InsuranceController::class, 'destroy']);
    
    Route::get('/first_aid', [FirstAidController::class, 'index']);
    Route::post('/first_aid', [FirstAidController::class, 'store']);
    Route::get('/first_aid/{id}', [FirstAidController::class, 'show']);
    Route::put('/first_aid/{id}', [FirstAidController::class, 'update']);
    Route::delete('/first_aid/{id}', [FirstAidController::class, 'destroy']);
    Route::get('/login/check', [UserController::class, 'check']);
    Route::get('/login/refresh', [UserController::class, 'refresh']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/user', [UserController::class, 'index']);

});

Route::middleware('cors')->group(function () {
    Route::post('/login', [UserController::class, 'login']);
    
    // Route::post('/register', [UserController::class, 'register']);
    
});








