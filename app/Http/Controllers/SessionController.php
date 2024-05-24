<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Session::all();
       
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'date' => 'required',
            'session_type' => 'required',
        ]);

        // create
        $session = Session::create([
            'session_date'=> $request->date,
            
            'session_type' => $request->session_type,
        ]);
        // returns json date:
        return response()->json($session);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // find by specific ID
        $session = Session::find($id);

        return response()->json($session);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'session_date' => 'required',
            'session_type' => 'required'
        ]);

        // 
        $session = Session::find($id);
        $session->update($request->all());
        

        return response()->json($session);
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $session = Session::find($id);

        if ($session) {
            $session->delete();
            return response()->json(['message' => 'Session deleted successfully.']);
        } else {
            return response()->json(['message' => 'Session not found.']);
        }
        
    }

    public function totalsessions()
    {
        $total = Session::count();

        return response()->json($total);
    }
}
