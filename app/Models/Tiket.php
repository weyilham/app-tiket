<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Relasi one-to-many dengan model Transaksi
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'tiket_id', 'id');
    }
}
