<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
        [
            'namaUser' => 'Administator',
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'id_outlet' => '1',
            'role' => 'admin'
        ],
        [
            'namaUser' => 'Kasir1',
            'username' => 'kasir1',
            'password' => Hash::make('123456'),
            'id_outlet' => '2',
            'role' => 'kasir'
        ],
        [
            'namaUser' => 'Kasir2',
            'username' => 'kasir2',
            'password' => Hash::make('123456'),
            'id_outlet' => '3',
            'role' => 'kasir'
        ],
    ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
