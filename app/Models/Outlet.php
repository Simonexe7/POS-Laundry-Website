<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'outlet';
    protected $fillable = ['nama_outlet', 'alamat', 'telp'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
