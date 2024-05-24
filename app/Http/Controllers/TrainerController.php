<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WorkoutPlan;
use App\Models\Session;

class TrainerController extends Controller
{
    public function getMembers()
    {
        $members = User::where('role', 'member')->get();

        return response()->json($members);
    }

    // Get members registered for a session
    public function getSessionMembers($sessionId)
    {
        $session = Session::with('member')->where('id', $sessionId)->first();
        return response()->json($session->member);
    }

    // Create a workout plan
    public function createWorkoutPlan(Request $request)
    {
        $workoutPlan = WorkoutPlan::create([
            'trainer_id' => $request->trainer_id,
            'member_id' => $request->member_id,
            'plan' => $request->plan,
        ]);
        return response()->json($workoutPlan, 201);
    }

    // Update a workout plan
    public function updateWorkoutPlan(Request $request, $id)
    {
        $workoutPlan = WorkoutPlan::findOrFail($id);
        $workoutPlan->update($request->all());
        return response()->json($workoutPlan, 200);
    }

    // Delete a workout plan
    public function deleteWorkoutPlan($id)
    {
        WorkoutPlan::destroy($id);
        return response()->json(null, 204);
    }
}
