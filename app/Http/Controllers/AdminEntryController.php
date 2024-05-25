<?php

namespace App\Http\Controllers;

use App\Models\AdminEntry;
use Illuminate\Http\Request;

class AdminEntryController extends Controller
{
    /**
     * Display a listing of the entries.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = AdminEntry::all();
        return view('admin_entries.index', compact('entries'));
    }

    /**
     * Show the form for creating a new entry.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $request->validate([
            'name' => $request->name,
            'email' => $request->email,
            
            'role_id' => $selectedRoleId,
        ]);
        return response()->json($session);
    }

    /**
     * Store a newly created entry in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:member,trainer',
            'action' => 'required|in:edit,delete',
        ]);

        AdminEntry::create($request->all());

        return redirect()->route('admin_entries.index')
                         ->with('success', 'Entry created successfully.');
    }
}

