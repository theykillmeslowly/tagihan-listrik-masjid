<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masjids', function (Blueprint $table) {
            $table->id();
            $table->string('nama_masjid');
            $table->string('alamat');
            $table->string('no_listrik');
            $table->string('gambar');
            $table->string('nama_pengurus');
            $table->string('no_pengurus');
            $table->enum('status', ['lunas', 'belum_lunas']);
            $table->enum('tampil', ['ya', 'tidak']);
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
        Schema::dropIfExists('masjids');
    }
};
