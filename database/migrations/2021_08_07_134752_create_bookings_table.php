<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ruangan');
            $table->string('email_dosen');
            $table->string('nama_kegiatan');
            $table->text('deskripsi');
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->timestamp('waktu_mulai')->nullable();
            $table->timestamp('waktu_selesai')->nullable();
            $table->enum('status_peminjaman', ['menunggu persetujuan dosen','ditolak', 'menunggu konfirmasi TU', 'booked', 'sedang digunakan','selesai'])->default('menunggu persetujuan dosen');
            $table->timestamps();

            // Foreign Key
            $table->foreign('kode_ruangan')->references('kode')->on('rooms');
            $table->foreign('email_dosen')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
