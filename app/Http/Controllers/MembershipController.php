<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;


class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Membership::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'membership_type' => 'required|in:Premium Membership,Group Membership,Corporate Membership,Individual Membership',
        ]);
        
        $membership = Membership::create([
            
            'membership_type' => $request->membership_type,
        ]);
        // returns json date:
        return response()->json($membership_type);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $membership = Membership::find($id);

        return response()->json($membership);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'membership_type' => 'required|in:Premium Membership,Group Membership,Corporate Membership,Individual Membership',
        ]);

        // 
        $membership = Membership::update($request->all());

        return response()->json($membership);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
