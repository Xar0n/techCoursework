<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EquipmentController;

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

Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('equipment', [EquipmentController::class, 'show']);
    Route::patch('equipments/{id}', [EquipmentController::class, 'update']);
    Route::get('equipments', [EquipmentController::class, 'showAll']);
    Route::post('equipments', [EquipmentController::class, 'create']);
    Route::post('logout', [AuthController::class, 'logout']);
});
