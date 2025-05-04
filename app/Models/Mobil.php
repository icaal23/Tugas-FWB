<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = ['nama_mobil', 'merk', 'tahun', 'harga', 'stok'];

    public function transaksis(){
        return $this->hasMany(Transaksi::class);
    }
}
