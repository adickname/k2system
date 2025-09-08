<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    protected $guard = 'admin';
    public function __construct()
    {

        Auth::shouldUse($this->guard);
    }
    public function addAccount(Request $request)
    {

        $user = $request->user();
        if (!$user) {
            $fields =  $request->validate([
                'username' => 'required|unique:admins',
                'password' => 'required',
            ]);
            $user = Admin::create(['username' => $fields['username'], 'password' => Hash::make($fields['password'])]);
            Auth::login($user);
            $request->session()->regenerate();
            return response()->json(['message' => "created successfully"], 201);
        }
        return response()->json(["message" => "couldn't create user"], 409);
    }
    public function deleteAccount(Request $request) {}
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|exists:admins',
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
}
