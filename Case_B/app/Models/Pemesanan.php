<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemesanan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_pemesan',
        'email',
        'nama_konser',
        'tanggal_konser',
        'jumlah_tiket',
        'kategori_tiket',
        'status_pemesanan',
    ];
}
