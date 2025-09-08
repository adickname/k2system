<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    /**
     * Store a new user
     */
    public function store(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            $fields =  $request->validate([
                'email' => 'required|unique:users',
                'password' => 'required',
            ]);
            $user = User::create(['email' => $fields['email'], 'password' => Hash::make($fields['password'])]);
            Auth::login($user);
            $request->session()->regenerate();
            return response()->json(['message' => "created successfully"], 201);
        }
        return response()->json(["message" => "couldn't create user"], 409);
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['message' => 'Logged in']);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return [
            'message' => 'Logged out'
        ];
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user) {}
}
