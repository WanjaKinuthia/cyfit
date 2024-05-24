<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
       
        return response()->json($bookings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
           
            'session_id' => 'required|exists:sessions,id',
           
            'session_type' => 'required|in:cardio,strength_training,flexibility',
        ]);

        // Assuming user_id and session_id are passed in the request
        // Create new booking with the validated data
        $booking = new Booking();
        $booking->user_id = auth()->user()->id;
        $booking->session_id = $request->input('session_id');
        $booking->save();

        return response()->json(['message' => 'Booking created successfully', 'booking' => $booking], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            return response()->json($booking);
        } else {
            return response()->json(['message' => 'Booking not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'date' => 'required',
            'session_type' => 'required|in:cardio,strength_training,flexibility',
        ]);

        $booking = Booking::find($id);

        if ($booking) {
            $booking->update($request->all());
            return response()->json($booking);
        } else {
            return response()->json(['message' => 'Booking not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            $booking->delete();
            return response()->json(['message' => 'Booking deleted successfully']);
        } else {
            return response()->json(['message' => 'Booking not found'], 404);
        }
    }
}
