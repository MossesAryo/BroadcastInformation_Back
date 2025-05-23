<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class siswa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswaList = [
            ['2306510491', 'ABIJALU ANGGA PUTRA'],
            ['2306510492', 'AHMAD LUTFI KHAIRUL KHAIR'],
            ['2306510493', 'AKHDAN DWI RAMADHAN MAMBRAKU'],
            ['2306510494', 'ANDRIANA SYAHPUTRA'],
            ['2306510495', 'ARGA TEJA ALMUGHNI'],
            ['2306510498', 'BAYU RESNADI'],
            ['2306510499', 'CARIN ZULEYKA'],
            ['2306510500', 'DWI NUR ALIFA'],
            ['2306510504', 'EKA ADITYA RACHMAT'],
            ['2306510505', 'EVI RESTIYANI'],
            ['2306510506', 'FABIAN VARGA ADITYA'],
            ['2306510508', 'FAJAR SIDIQ'],
            ['2306510509', 'FARREL LURI ARIESTA'],
            ['2306510510', 'KEISHA AQILAH PUTRI FELLIA'],
            ['2306510511', 'MOCHAMAD AKMAL ZAINS'],
            ['2306510520', 'MOSSES ARYO BIMO'],
            ['2306510523', 'MUHAMMAD ADIL BADILLAH'],
            ['2306510527', 'MUHAMMAD RIPKI'],
            ['2306510529', 'MUHAMMAD ANDRA MAULANA'],
            ['2306510532', 'MUHAMMAD IRHAM BACHTIAR'],
            ['2306510533', 'MUHAMMAD NADHIP RAHMATILLAH'],
            ['2306510534', 'MUHAMMAD RIZKY ALAMSYAH'],
            ['2306510536', 'MUHAMMAD SULAEMAN'],
            ['2306510537', 'MUHAMMAD TAUFIK RIAYADI'],
            ['2306510538', 'NABIL FAUZI NASRULLOH'],
            ['2306510539', 'NABILLA DEWI ARIATI'],
            ['2306510540', 'NOVI AULIA'],
            ['2306510541', 'NUR MAHENDRA SETIABUDI'],
            ['2306510543', 'ODZA INZAGHI MASRI'],
            ['2306510544', 'PUTRA NUGRAHA'],
            ['2306510545', 'REEGIL RADIT SETIAWAN'],
            ['2306510548', 'REGINA BUNGA PRATIWI'],
            ['2306510551', 'RIANI DESTIANTI'],
            ['2306510558', 'SITI DIYAH WULANDARI'],
        ];

        $usernames = DB::table('users')->pluck('username')->slice(5, 5);

        $data = [];

        foreach ($siswaList as $i => [$id, $nama]) {
            $data[] = [
                'ID_Siswa' => $id,
                'Nama_Siswa' => $nama,
                'username' => $usernames[$i] ?? Str::slug($nama),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('siswa')->insert($data);
    }
}
