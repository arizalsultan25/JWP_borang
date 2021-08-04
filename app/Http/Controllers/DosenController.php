<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role-handler');
        // if(Auth: Auth::user()->role == 'tu'){
        //     echo 'ada';
        // }else{
        //     echo 'tidak ada';
        // }
    }

    public function index()
    {
        return view('dosen.dashboard');
        // dd(Auth::user()->role);
    }
}
