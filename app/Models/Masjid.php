<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_masjid', 
        'alamat',
        'no_listrik',
        'gambar',
        'nama_pengurus',
        'no_pengurus',

        'status',
        'tampil'
    ];
}
