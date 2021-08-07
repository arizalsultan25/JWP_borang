<?php

namespace App\Http\Controllers;

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
        //
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
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
