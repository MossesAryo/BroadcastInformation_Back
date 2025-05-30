<?php

namespace App\Imports;

use App\Models\guru;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class GuruImport implements ToModel, WithHeadingRow
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
        ]);

        return new Guru([
            'ID_Guru'   => $row['nip'],
            'Nama_Guru' => $row['nama_guru'],
            'username'   => $email,
        ]);
    }
}
