<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class siswa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usernames = DB::table('users')->pluck('username')->slice(5 , 5);

        $siswaData = [];

        $namaList = [
            'Riani Destianti',
            'Fajar Sidiq',
            'Mosses Aryo Bimo',
            'Evi Destianti',
            'Nadhip Rahmatillah',
        ];

        foreach ($usernames as $i => $username) {
            $siswaData[] = [
                'Nama_Siswa' => $namaList[$i] ?? "Siswa Tanpa Nama $i",
                'username' => $username, 
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('siswa')->insert($siswaData);
    }
}
