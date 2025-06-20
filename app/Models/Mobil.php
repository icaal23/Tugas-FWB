<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'merk',
        'model',
        'tahun',
        'harga',
        'stok',
        'gambar',
        'marketing_id',
    ];

    public function marketing()
    {
        return $this->belongsTo(User::class, 'marketing_id');
    }
}