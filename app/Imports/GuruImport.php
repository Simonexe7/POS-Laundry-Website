<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class GuruImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guru([
            'id' => $row['id'],
            'nama' => $row['nama'],
            'nip' => $row['nip'],
            'nama' => $row['nama'],
            'jenisKelamin' => $row['jenis_kelamin'],
            'tempatLahir' => $row['tempat_lahir'],
            'tanggalLahir' => $row['tanggal_lahir'],
            'nik' => $row['nik'],
            'agama' => $row['agama'],
            'alamat' => $row['alamat'],
            'isActive' => $row['keaktifan'],
            'isDeleted' => $row['status'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ]);

    }

    public function headingRow(): int
    {
        return 3;
    }
}
