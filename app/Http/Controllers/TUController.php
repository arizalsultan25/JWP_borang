<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
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

    // halaman dashboard
    public function index()
    {
        return view('tata-usaha.dashboard');
    }

    // halaman peminjaman
    public function ruangan()
    {
        return view('tata-usaha.ruangan', [
            'data_ruangan' => Room::orderBy('kode', 'asc')->get()
        ]);
    }

    public function borang()
    {
        return view('tata-usaha.borang',[
            'data_borang' => Booking::get()
        ]);
    }

}
