<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    /**
     * Store a new user
     */
    public function store(Request $request)
    {
        //one of potential solutions
        $user = $request->user();
        if (!$user) {
            $fields =  $request->validate([
                'email' => 'required|unique:users',
                'password' => 'required',
            ]);
            $user = User::create(['email' => $fields['email'], 'password' => Hash::make($fields['password'])]);
            $token = $user->createToken($request->email);
            return ['token' => $token->plainTextToken];
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            $request->validate([
                'email' => 'required|exists:users',
                'password' => 'required'
            ]);
            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return ['message' => "Couldn't login"];
            }

            $token = $user->createToken($request->email);
            return ['token' => $token->plainTextToken];
        }
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
