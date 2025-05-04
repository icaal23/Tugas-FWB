<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembeli extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'alamat', 'no_hp'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transaksis(){
        return $this->hasMany(Transaksi::class);
    }
}
