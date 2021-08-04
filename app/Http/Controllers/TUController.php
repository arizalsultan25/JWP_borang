<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TUController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role-handler');
        if(Auth::user() && Auth::user()->role == 'dosen'){
            redirect(route('dosen-index'));
        }
    }

    public function index()
    {
        return view('tata-usaha.dashboard');
        // dd(Auth::user()->role);
    }
}
