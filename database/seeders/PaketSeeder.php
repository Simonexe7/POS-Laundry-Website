<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paket;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paket = [
            [
                'id_outlet' => '1',
                'keterangan' => 'Paket ini mencuci lebih cepat',
                'nama_paket' => 'Fast Clean',
                'harga' => '10000'
            ],
            [
                'id_outlet' => '2',
                'keterangan' => 'Paket ini memberikan layanan mencuci lebih bersih dan menggunakan detergen berkualitas baik',
                'nama_paket' => 'Deep Clean I',
                'harga' => '12500'
            ],
            [
                'id_outlet' => '3',
                'keterangan' => 'Paket ini memberikan layanan mencuci lebih bersih dan menggunakan detergen berkualitas baik',
                'nama_paket' => 'Deep Clean II',
                'harga' => '17000'
            ],
            [
                'id_outlet' => '4',
                'keterangan' => 'Paket ini memberikan layanan mencuci lebih bersih dan menggunakan detergen berkualitas baik',
                'nama_paket' => 'Karpet',
                'harga' => '20000'
            ]
        ];
    
            foreach ($paket as $key => $value) {
                Paket::create($value);
            }
    }
}
