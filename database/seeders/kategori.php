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
                'NamaKategori' => 'Pengumuman',
                'Deskripsi'    => 'Berisi informasi umum yang ditujukan untuk seluruh warga sekolah.',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'NamaKategori' => 'Acara',
                'Deskripsi'    => 'Informasi terkait kegiatan OSIS, ekstrakurikuler, dan lomba.',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'NamaKategori' => 'Umum',
                'Deskripsi'    => 'Berisi jadwal rapat, pelatihan, dan pengumuman untuk guru.',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'NamaKategori' => 'Akademik',
                'Deskripsi'    => 'Menyediakan informasi tentang kurikulum, ujian, dan nilai.',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'NamaKategori' => 'Berita',
                'Deskripsi'    => 'Pengumuman umum seperti perbaikan fasilitas dan layanan sekolah.',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ];

        DB::table('kategori_informasi')->insert($data);
    }
}
