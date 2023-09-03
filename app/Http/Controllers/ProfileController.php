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
        ]);

        $updateData = [
            'fullname' => $validated['fullname'],
            'email' => $validated['email'],
        ];

        // Periksa apakah password baru diisi
        if (!empty($request->input('passwordbaru'))) {
            $request->validate([
                'passwordlama' => 'required',
                'passwordbaru' => 'required|min:5|max:255'
            ]);

            // Periksa apakah password lama cocok
            if (Hash::check($request->input('passwordlama'), $user->password)) {
                $updateData['password'] = Hash::make($request->input('passwordbaru'));
            } else {
                return back()->with('error', 'Password Lama tidak cocok.');
            }
        }

        $user->update($updateData);

        return redirect('/profile')->with('success', 'Akun berhasil di update!');
    }

}
