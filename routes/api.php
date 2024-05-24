<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\TotalMembershipController;
use App\Http\Controllers\BookingsController;


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
Route::delete('/users', [UsersController::class, 'destroy']);


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

// Session routes
Route::get('/sessions', [SessionController::class, 'index']);
    Route::get('/sessions/session-members/{id}', [SessionController::class, 'show']);
    Route::post('/sessions', [SessionController::class, 'store']);
    Route::delete('/sessions/{id}', [SessionController::class, 'destroy']);
    Route::get('/sessions/totalsessions', [SessionController::class, 'totalsessions']);
    //update
    Route::put('/sessions/{id}', [SessionController::class, 'update']);


    
    
    Route::post('/sessions/workout-plans', [TrainerController::class, 'store']);
    Route::put('/trainer/workout-plans/{id}', [TrainerController::class, 'update']);
    Route::delete('/trainer/workout-plans/{id}', [TrainerController::class, 'destroy']);

    Route::get('/membership', [MembershipController::class, 'index']);
    Route::post('/membership', [MembershipController::class, 'store']);

    Route::get('/booking', [BookingsController::class, 'index']);
    Route::post('/booking', [BookingsController::class, 'store']);

    Route::get('/totalmembership', [TotalMembershipController::class, 'index']);




    Route::get('/booking/{id}', [BookingsController::class, 'update']);
    Route::delete('/booking/workout-plans/{id}', [BookingsController::class, 'destroy']);