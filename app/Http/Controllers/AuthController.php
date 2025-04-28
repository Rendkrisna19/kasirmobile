<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login'); // View login kamu tadi
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['username' => 'Invalid credentials.']);
        }

        // Simpan login ke session
        session(['user_id' => $user->id]);

        return redirect('/kasir');
    }

    public function logout()
    {
        session()->forget('user_id');
        return redirect('/');
    }

    //mengambil nama user 



    
}