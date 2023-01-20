<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prices extends Model
{

    use HasFactory;

    public function lapangan(){
        return $this->belongsTo(Lapangan::class);
    }

    public function hour(){
        return $this->belongsTo(Hours::class);
    }

    public function day(){
        return $this->belongsTo(Days::class);
    }

    protected $fillable = [
        'lapangan_id',
        'hour_id',
        'day_id',
        'harga',
    ];
    
}
