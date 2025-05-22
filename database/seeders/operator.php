<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class operator extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usernames = DB::table('users')->pluck('username')->slice(10, 5)->values();
       $departemen = DB::table('departemen')->pluck('ID_Departemen')->take(5)->values()->all();

        $operatorData = [];

        $namaList = [
            'Agus Setiawan',
            'Rahmat Irianto',
            'Fajar Bimo',
            'Reegil aditya',
            'Ableh rizky',
        ];

        foreach ($usernames as $i => $username) {
            $operatorData[] = [
                'ID_Departemen' => $departemen[$i] ?? null,
                'NamaOperatorDepartemen' => $namaList[$i] ?? "operator Tanpa Nama $i",
                'username' => $username, 
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('operator_departemen')->insert($operatorData);
    }
}
