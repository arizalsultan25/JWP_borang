<?php

namespace App\Http\Controllers;

use App\Models\Booking;
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

    // Halaman dashboard
    public function index()
    {
        return view('dosen.dashboard');
        // dd(Auth::user()->role);
    }

    // Halaman borang
    public function borang()
    {
        return view('dosen.borang',[
            'data_borang' => Booking::whereEmail_dosen(Auth::user()->email)->get()
        ]);
    }

    // Konfirmasi peminjaman
    public function konfirmasi(Request $request)
    {
        $borang = Booking::find($request->id);
        $borang->update([
            'status_peminjaman' => 'menunggu konfirmasi TU'
        ]);

        return redirect(route('dosen-borang'))->with('success', 'Peminjaman telah berhasil dikonfirmasi');
    }
}
