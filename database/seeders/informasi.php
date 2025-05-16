<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class informasi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $idOperator = DB::table('operator_departemen')->pluck('IDOperator')->take(5);
        $idKategori = DB::table('kategori_informasi')->pluck('IDKategoriInformasi')->take(5);

        $judulList = [
            'Penerimaan Siswa Baru',
            'Rapat Dinas Guru',
            'Pendaftaran Lomba Karya Tulis',
            'Perbaikan Fasilitas Sekolah',
            'Sosialisasi Kurikulum Baru'
        ];

        $deskripsiList = [
            'Informasi lengkap mengenai alur dan persyaratan PPDB tahun ajaran ini.',
            'Rapat internal guru membahas evaluasi dan perencanaan pembelajaran.',
            'Ayo daftarkan dirimu dalam lomba karya tulis ilmiah tingkat kota!',
            'Sekolah akan melakukan renovasi beberapa fasilitas umum.',
            'Sosialisasi tentang implementasi kurikulum merdeka belajar.'
        ];

        $thumbnailList = [
            'ppdb.jpg',
            'rapat_guru.jpg',
            'lomba_karya.jpg',
            'renovasi.jpg',
            'kurikulum.jpg'
        ];

        $data = [];

        foreach (range(0, 4) as $i) {
            $data[] = [
                'IDOperator'         => $idOperator[$i],
                'IDKategoriInformasi'=> $idKategori[$i],
                'Judul'              => $judulList[$i],
                'Deskripsi'          => $deskripsiList[$i],
                'Thumbnail'          => $thumbnailList[$i],
                'TanggalMulai'       => now()->addDays($i),
                'TanggalSelesai'     => now()->addDays($i + 3),
                'created_at'         => now(),
                'updated_at'         => now(),
            ];
        }

        DB::table('informasi')->insert($data);
    }
}
