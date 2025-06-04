<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswaList = [
            'ABIJALU ANGGA PUTRA',
            'AHMAD LUTFI KHAIRUL KHAIR',
            'AKHDAN DWI RAMADHAN MAMBRAKU',
            'ANDRIANA SYAHPUTRA',
            'ARGA TEJA ALMUGHNI',
            'BAYU RESNADI',
            'CARIN ZULEYKA',
            'DWI NUR ALIFA',
            'EKA ADITYA RACHMAT',
            'EVI RESTIYANI',
            'FABIAN VARGA ADITYA',
            'FAJAR SIDIQ',
            'FARREL LURI ARIESTA',
            'KEISHA AQILAH PUTRI FELLIA',
            'MOCHAMAD AKMAL ZAINS',
            'MOSSES ARYO BIMO',
            'MUHAMMAD ADIL BADILLAH',
            'MUHAMMAD RIPKI',
            'MUHAMMAD ANDRA MAULANA',
            'MUHAMMAD IRHAM BACHTIAR',
            'MUHAMMAD NADHIP RAHMATILLAH',
            'MUHAMMAD RIZKY ALAMSYAH',
            'MUHAMMAD SULAEMAN',
            'MUHAMMAD TAUFIK RIAYADI',
            'NABIL FAUZI NASRULLOH',
            'NABILLA DEWI ARIATI',
            'NOVI AULIA',
            'NUR MAHENDRA SETIABUDI',
            'ODZA INZAGHI MASRI',
            'PUTRA NUGRAHA',
            'REEGIL RADIT SETIAWAN',
            'REGINA BUNGA PRATIWI',
            'RIANI DESTIANTI',
            'SITI DIYAH WULANDARI',
        ];

        $users = [];

        foreach ($siswaList as $nama) {
            $username = Str::slug($nama);
            $users[] = [
                'username' => $username,
                'email' => $username . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 1 ,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('users')->insert($users);
    }
}
