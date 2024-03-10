<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';
    protected $fillable = ['id_outlet', 'keterangan', 'nama_paket', 'harga'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
    
}
