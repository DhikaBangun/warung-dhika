<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function login(Request $request)
{
    // Memeriksa input dari form
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Memeriksa email dan password
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('home');
    }

    // Jika login gagal
    return back()
        ->withErrors([
            'email' => 'Email atau password salah.',
        ])
        ->onlyInput('email');
}

    public function showSignup()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        return redirect()->route('home');
    }
}
