<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'fullname' => 'required|min:3|max:255',
            'email' => 'required|unique:users,email,'. $user->id,
            'passwordlama' => 'required',
            'passwordbaru' => 'required|min:5|max:255'
        ]);

        if (Hash::check($validated['passwordlama'], $user->password)) {
            $user->update([
                'fullname' => $validated['fullname'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['passwordbaru']),
            ]);

            return redirect('/profile')->with('success', 'Akun berhasil di update!');
        }
        
        return back()->with('error', 'Password Lama tidak cocok.');
    }
}
