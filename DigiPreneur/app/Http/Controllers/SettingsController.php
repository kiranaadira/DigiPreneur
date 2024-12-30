<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class SettingsController extends Controller
{
    /**
     * Konstruktor untuk middleware `auth`.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan halaman pengaturan pengguna.
     */
    public function index()
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user(); // Mengambil data pengguna dari session
        return view('settings.index', compact('user'));
    }

    /**
     * Memperbarui pengaturan pengguna.
     */
    public function update(Request $request)
    {
        // Ambil data pengguna yang sedang login
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|min:8|confirmed', // Password opsional, minimal 8 karakter
        ]);

        // Update data pengguna
        $user->username = $request->username;
        $user->email = $request->email;

        // Jika password diisi, hash dan simpan password baru
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // Simpan perubahan ke database

        // Redirect dengan pesan sukses
        return redirect()->route('settings.index')->with('success', 'Pengaturan akun berhasil diperbarui!');
    }
}
