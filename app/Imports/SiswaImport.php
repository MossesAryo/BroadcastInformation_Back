<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class SiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
   

        $email = $row['email'];

        // Buat user baru jika belum ada
        $user = User::firstOrCreate([
            'username' => $email,
        ], [
            'email' => $email,
            'password' => bcrypt('password'), 
            'role' => 4
        ]);

        return new Siswa([
            'ID_Siswa'   => $row['nis'],
            'Nama_Siswa' => $row['nama_siswa'],
            'username'   => $email,
            
        ]);
    }
}
