<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama_ruangan');
            $table->enum('jenis', ['kelas','lab'])->default('kelas');
            $table->string('daya_tampung');
            $table->string('fasilitas');
            $table->string('gambar')->default('no-image.jpg');
            $table->text('keterangan');
            $table->enum('status', ['available','booked', 'used'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
