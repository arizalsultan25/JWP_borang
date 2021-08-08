<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Booking::insert([
            'kode_ruangan' => $request->kode_ruangan,
            'email_dosen' => $request->email_dosen,
            'nama_kegiatan' => $request->nama_kegiatan,
            'deskripsi' => $request->deskripsi,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $kode = $request->kode_ruangan;

        return redirect(route('ruangan.show', $kode))->with('success', 'Borang ruangan ' . $kode . ' telah berhasil diajukan, Silahkan hubungi dosen yang bersangkutan untuk approval');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->status);
        $booking = Booking::find($id);
        $ruangan = Room::whereKode($booking->kode_ruangan)->first();

        if ($request->status == 'approved') {
            // Update status booking
            $booking->update([
                'status_peminjaman' => 'booked'
            ]);

            // update status ruangan
            $ruangan->update([
                'status' => 'booked'
            ]);

            return redirect(route('tu-borang'))->with('success', 'Data Peminjaman telah berhasil ditanggapi');
        } else if ($request->status == 'rejected') {
            // Update status booking
            $booking->update([
                'status_peminjaman' => 'ditolak'
            ]);

            return redirect(route('tu-borang'))->with('success', 'Data Peminjaman telah berhasil ditanggapi');
        } else if ($request->status == 'pinjamkan') {
            // Update status booking
            $booking->update([
                'status_peminjaman' => 'sedang digunakan'
            ]);

            // update status ruangan
            $ruangan->update([
                'status' => 'used'
            ]);

            return redirect(route('tu-borang'))->with('success', 'Ruangan telah berhasil dipinjamkan');
        } else if ($request->status == 'kembalikan') {
            // Update status booking
            $booking->update([
                'status_peminjaman' => 'selesai'
            ]);

            // update status ruangan
            $ruangan->update([
                'status' => 'available'
            ]);

            return redirect(route('tu-borang'))->with('success', 'Ruangan telah berhasil dikembalikan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
