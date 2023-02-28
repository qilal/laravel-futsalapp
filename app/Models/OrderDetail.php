<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function hour()
    {
        return $this->belongsTo(hours::class);
    }

    public function day()
    {
        return $this->belongsTo(Days::class);
    }

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class,'lapangan_id','id_lapangan_futsal');
    }
}
