<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Auth;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Mail\UserCreated;
use Illuminate\Support\Facades\Mail;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->get();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            //'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => 'required',
        ]);

        // Map role names to role IDs
   

         // Retrieve the selected role ID based on the selected role name
    $password = \Str::random(8);
   

    // Create a new user record and assign the selected role ID
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => \Hash::make($password),
        'role_id' => $request->role_id, // Assign the selected role ID
    ]);
    Mail::to($user)->send(new UserCreated($user,$password));


        //event(new Registered($user));

        auth()->login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $user = User::find($id);
        $user->update($request->all());
        return response()->json(['message' => 'User updated successfully.'], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'User  found.'], 404);


       // if ($user && user->id !== auth()->user()->id) {
         //   $user->delete();
          //  return response()->json(['message' => 'User deleted successfully.'], 200);
       /// } else {
          //  return response()->json(['message' => 'User not found.'], 404);
       // }
    }
}
