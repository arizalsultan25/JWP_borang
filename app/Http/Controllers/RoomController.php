<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('room-list', [
            'rooms' => Room::orderBy('kode', 'asc')->get()
        ]);
    }

    public function search(Request $request)
    {
        return view('room-search', [
            'rooms' => Room::where('kode', 'like', "%$request->s%")->orWhere('nama_ruangan', 'like', "%$request->s%")->orderBy('kode', 'asc')->get(),
            'keyword' => $request->s
        ]);
            // $room = Room::where('kode', 'like', "%$request->s%")->orWhere('nama_ruangan', 'like', "%$request->s%")->orderBy('kode', 'asc')->get();
            // // dd($room);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tata-usaha.create-room');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $nama_gambar = 'Ruangan-' . $request->kode . '.' . $request->gambar->extension();

        // Upload
        $upload = $request->gambar->move(public_path('gambar'), $nama_gambar);

        Room::insert([
            'kode' => $request->kode,
            'nama_ruangan' => $request->nama_ruangan,
            'jenis' => $request->jenis,
            'daya_tampung' => $request->daya_tampung,
            'fasilitas' => $request->fasilitas,
            'gambar' => $nama_gambar,
            'keterangan' => $request->keterangan,
        ]);
        return redirect(route('tu-ruangan'))->with('success', 'Data Ruangan telah berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($kode)
    {
        //
        $room = Room::whereKode($kode)->first();
        return view('room-detail', [
            'room' => $room,
            'semua_dosen' => User::whereRole('dosen')->orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($kode)
    {
        $room = Room::whereKode($kode)->first();
        return view('tata-usaha.edit-room', [
            'ruangan' => $room,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update($kode, Request $request)
    {
        //Validation
        $request->validate([
            'kode' => ['required'],
            'nama_ruangan' => ['required'],
            'jenis' => ['required'],
            'daya_tampung' => ['required', 'min:1'],
            'fasilitas' => ['required'],
            'gambar' => ['image','mimes:png,jpg,jpeg,gif','max:5096'],
            'keterangan' => ['required'],
        ]);

        // Ruangan
        $ruangan = Room::whereKode($request->kode)->first();

        if($request->gambar !== null){
            $nama_gambar = 'Ruangan-' . $request->kode . '.' . $request->gambar->extension();

            // Upload
            $upload = $request->gambar->move(public_path('gambar'), $nama_gambar);

            $ruangan->update([
                'kode' => $request->kode,
                'nama_ruangan' => $request->nama_ruangan,
                'jenis' => $request->jenis,
                'daya_tampung' => $request->daya_tampung,
                'fasilitas' => $request->fasilitas,
                'gambar' => $nama_gambar,
                'keterangan' => $request->keterangan,
            ]);
        }else{
            $ruangan->update([
                'kode' => $request->kode,
                'nama_ruangan' => $request->nama_ruangan,
                'jenis' => $request->jenis,
                'daya_tampung' => $request->daya_tampung,
                'fasilitas' => $request->fasilitas,
                'keterangan' => $request->keterangan,
            ]);
        }

        return redirect(route('tu-ruangan'))->with('success', 'Data Ruangan telah berhasil diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode)
    {
        $ruang = Room::where('kode','=',$kode)->first();
        $ruang->delete();

        return redirect(route('tu-ruangan'))->with('success', 'Data Ruangan telah berhasil dihapus');
    }
}
