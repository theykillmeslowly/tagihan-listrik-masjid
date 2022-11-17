<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasjidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Masjid::create([
            'nama_masjid'   => 'Masjid Daarul Istiqomah dh. Bani Ali',
            'alamat'        => 'Desa Kebadongan RT 02 RW 03 Kecamatan Klirong, Kebumen, Jawa Tengah',
            'no_listrik'    => '525041611692',
            'gambar'        => '/uploads/20210115113943.jpeg',
            'status'        => 'lunas',
            'tampil'        => 'ya',
            'nama_pengurus' => 'Ahmad Yani',
            'no_pengurus'   => '087839994311'
        ]);

        \App\Models\Masjid::create([
            'nama_masjid'   => 'Masjid Jami\' Al Ikhlas',
            'alamat'        => 'Kp. Cabang dua RT 018/06 desa Lenggahsari, Kec. Cabang bungin, Kab. Bekasi',
            'no_listrik'    => '537314369982',
            'gambar'        => '/uploads/20210115113816.jpeg',
            'status'        => 'lunas',
            'tampil'        => 'ya',
            'nama_pengurus' => 'Ahmad Yani',
            'no_pengurus'   => '087839994311'
        ]);

        \App\Models\Masjid::create([
            'nama_masjid'   => 'Masjid Al Muhajirin ',
            'alamat'        => 'Bojong Depok Baru I RW 08, Kedung Waringin, Bojonggede, Bogor',
            'no_listrik'    => '538711092420',
            'gambar'        => '/uploads/20210115111504.jpeg',
            'status'        => 'lunas',
            'tampil'        => 'ya',
            'nama_pengurus' => 'Ahmad Yani',
            'no_pengurus'   => '087839994311'
        ]);

        \App\Models\Masjid::create([
            'nama_masjid'   => 'Musholla Al Barkah',
            'alamat'        => 'Jalan KH. M. Sanusi RT 03 RW 04, Kedung Waringin, Bojonggede, Bogor',
            'no_listrik'    => '538413096263',
            'gambar'        => '/uploads/20210115111635.jpeg',
            'status'        => 'belum_lunas',
            'tampil'        => 'ya',
            'nama_pengurus' => 'Ahmad Yani',
            'no_pengurus'   => '087839994311'
        ]);

        /*\App\Models\Masjid::create([
            'nama_masjid'   => 'Masjid Jami\' Ar Rahman',
            'alamat'        => 'Kampung Waringin Jaya Lebak RW 01, Waringin Jaya, Bojonggede, Bogor',
            'no_listrik'    => '53831127704',
            'gambar'        => '/uploads/20200716133629.jpeg',
            'status'        => 'belum_lunas',
            'tampil'        => 'ya',
            'nama_pengurus' => 'Ahmad Yani',
            'no_pengurus'   => '087839994311'
        ]);*/
    }
}
