<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BantuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Bantuan::create([
            'judul' => 'Cara Sedekah Listrik',
            'konten' => '<p>
            1. Masuk ke halaman Beranda.<br/>
            2. Masuk ke menu Daftar Masjid atau pilih masjid di halaman Beranda.<br/>
            3. Klik tombol Cek Tagihan.<br/>
            4. Jika terdapat tagihan yang belum dibayar anda akan dialihkan ke halaman pembayaran. <br/>
            5. Lakukan pembayaran. <br/>
          </p>',
            'author' => 'admin',
        ]);
        \App\Models\Bantuan::create([
            'judul' => 'Cara mendaftarkan masjid ke Sedekah Listrik Masjid',
            'konten' => '<p>
            1. Masuk ke halaman Pendaftaran.<br/>
            2. Isi form dengan lengkap.<br/>
            3. Klik tombol Daftar sekarang.<br/>
            4. Admin melakukan verifikasi data, jika valid maka masjid akan ditampilkan. <br/>
          </p>',
            'author' => 'admin',
        ]);
    }
}
