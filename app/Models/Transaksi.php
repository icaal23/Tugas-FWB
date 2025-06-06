<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'mobil_id', 'tanggal_transaksi', 'jumlah'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function mobil(){
        return $this->belongsTo(Mobil::class);
    }
}
