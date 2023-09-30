<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|min:3|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        // Generate user ID dengan 5 angka random
        $user->user_id = mt_rand(10000, 99999);
        $user->save();

        return redirect('/login')->with('success', 'Please login, registration successfull!');
    }
}
