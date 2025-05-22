<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class guru extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usernames = DB::table('users')->pluck('username')->slice(0, 5);

        $guruData = [];

        $namaList = [
            'Andi Pratama',
            'Sari Wulandari',
            'Joko Susanto',
            'Lina Marlina',
            'Rudi Hartono',
            
        ];

        foreach ($usernames as $i => $username) {
            $guruData[] = [
                'Nama_Guru' => $namaList[$i] ?? "Guru Tanpa Nama $i",
                'username' => $username, 
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('guru')->insert($guruData);
    }
}
