<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mobil(){
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'pembeli_id');
    }
}