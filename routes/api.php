<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UsersController;


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
Route::get('/users', [UsersController::class,'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/trainer/members', [TrainerController::class, 'getMembers']);
    Route::get('/trainer/session-members/{id}', [TrainerController::class, 'getSessionMembers']);
    Route::post('/trainer/workout-plans', [TrainerController::class, 'createWorkoutPlan']);
    Route::put('/trainer/workout-plans/{id}', [TrainerController::class, 'updateWorkoutPlan']);
    Route::delete('/trainer/workout-plans/{id}', [TrainerController::class, 'deleteWorkoutPlan']);
});
