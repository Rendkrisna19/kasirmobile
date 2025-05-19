<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        // Sementara, pakai user ID 1 karena tidak ada sistem login
        $user = User::find(1); // Ganti ID sesuai user aktif jika ada sistem login

        if (!$user) {
            return redirect()->back()->withErrors('User tidak ditemukan.');
        }

        return view('pages.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(1); // Ganti dengan Auth::user() kalau nanti sudah pakai login

        if (!$user) {
            return redirect()->back()->withErrors('User tidak ditemukan.');
        }

        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->username = $request->username;

        // Password diupdate jika ada input
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Upload foto profil jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($user->photo && file_exists(public_path('uploads/profile/' . $user->photo))) {
                unlink(public_path('uploads/profile/' . $user->photo));
            }

            $photo = $request->file('photo');
            $filename = uniqid() . '.' . $photo->getClientOriginalExtension();

            // Simpan langsung ke public/uploads/profile
            $photo->move(public_path('uploads/profile'), $filename);

            $user->photo = $filename;
        }


        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}