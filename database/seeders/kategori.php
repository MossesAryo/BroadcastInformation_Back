<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategori extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'NamaKategori' => 'Pengumuman Sekolah',
                'Deskripsi'    => 'Berisi informasi umum yang ditujukan untuk seluruh warga sekolah.',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'NamaKategori' => 'Kegiatan Siswa',
                'Deskripsi'    => 'Informasi terkait kegiatan OSIS, ekstrakurikuler, dan lomba.',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'NamaKategori' => 'Informasi Guru',
                'Deskripsi'    => 'Berisi jadwal rapat, pelatihan, dan pengumuman untuk guru.',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'NamaKategori' => 'Layanan Akademik',
                'Deskripsi'    => 'Menyediakan informasi tentang kurikulum, ujian, dan nilai.',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'NamaKategori' => 'Layanan Umum',
                'Deskripsi'    => 'Pengumuman umum seperti perbaikan fasilitas dan layanan sekolah.',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ];

        DB::table('kategori_informasi')->insert($data);
    }
}
