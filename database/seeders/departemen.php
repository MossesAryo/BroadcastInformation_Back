<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class departemen extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('departemen')->insert([
            [
                'ID_Departemen' => 1,
                'Nama_Departemen' => 'Kesiswaan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ID_Departemen' => 2,
                'Nama_Departemen' => 'SDM',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ID_Departemen' => 3,
                'Nama_Departemen' => 'Hubin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ID_Departemen' => 4,
                'Nama_Departemen' => 'Kurikulum',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'ID_Departemen' => 5,
                'Nama_Departemen' => 'Tata Usaha',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
