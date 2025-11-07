<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
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
    public function isLoged(Request $request)
    {
        $user = $request->user();
        if ($user) {
            return ['isUser' => true];
        } else {
            return ['isUser' => false];
        }
    }
    public function orders(Request $request)
    {
        $user = $request->user();
        if ($user) {
            $orders = $user->orders()->get();
            foreach ($orders as $order) {
                $order->load(['orderItems.product' => function ($query) {
                    $query->select('id', 'name', 'image');
                }]);
                foreach ($order->orderItems as $item) {
                    $item->makeHidden(['created_at', 'updated_at', 'id', 'order_id', 'product_id']);
                }
            }
            return ['response' => $orders];
        }
    }
}
