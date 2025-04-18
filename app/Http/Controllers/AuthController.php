<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function addAcount(Request $request)
    {
        $fields =  $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required',
        ]);
        $admin =  Admin::create([
            'username' => $fields['username'],
            'password' => Hash::make($fields['password'])
        ]);
        $token = $admin->createToken($request->username);
        return ['token' => $token->plainTextToken];
    }
    public function deleteAcount(Request $request)
    {
        $admin = $request->user();
        $request->user()->tokens()->delete();
        $deleted =  $admin->delete();
        if ($deleted) {
            return [
                'message' => 'deleted'
            ];
        } else {
            return [
                'message' => 'did not deleted'
            ];
        }
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:admins',
            'password' => 'required'
        ]);

        $admin = Admin::where('username', $request->username)->first();
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return ['message' => "Couldn't login"];
        }

        $token = $admin->createToken($request->username);
        return ['token' => $token->plainTextToken];
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }
}
