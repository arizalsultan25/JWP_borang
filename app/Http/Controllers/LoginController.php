<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
    }

    // Halaman Login
    public function index()
    {
        $this->middleware('guest');

        return view('login');
    }

    // Fungsi Login
    public function login(LoginRequest $request)
    {
        // $this->middleware('guest');

        // Login
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            // Jika benar
            // return redirect(RouteServiceProvider::HOME)->with('success', 'Login berhasil');
            if(Auth::user()->role == 'tu'){
                return redirect(route('tu-index'));
            }else{
                return redirect(route('dosen-index'));
            }
        }

        // Jika salah
        throw ValidationException::withMessages([
            'email' => 'Email atau password tidak cocok'
        ]);

    }

    // Log out
    public function logout()
    {
        Auth::logout();
        // session()->flush();
        // Redirect ke halaman home
        return redirect(RouteServiceProvider::HOME);
        // echo 'logout';
    }
}
