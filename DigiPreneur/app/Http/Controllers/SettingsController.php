<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SettingsController extends Controller
{
    public function index()
    {
        // Ambil pengguna default berdasarkan ID atau email
        $user = User::where('email', 'admin@gmail.com')->first();
        return view('settings.index', compact('user'));
    }

    public function update(Request $request)
    {
       // Ambil pengguna default berdasarkan ID atau email
       $user = User::where('email', 'admin@gmail.com')->first();

        // Validasi inputan
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Update data pengguna
        $user->username = $request->username;
        $user->email = $request->email;

        // Jika ada input password baru, update password
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Redirect kembali ke halaman settings dengan pesan sukses
        return redirect()->route('settings.index')->with('success', 'Account settings updated successfully!');
    }
}
