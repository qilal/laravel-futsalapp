<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $primaryKey = 'id_lapangan_futsal';
    
    protected $fillable = [
        'nama', 'alamat',
        'jumlah_lapangan',
        'jumlah_bola'
    ];    

    use HasFactory;
}
