<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\user;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $this->call([
            user::class,
            Departemen::class,
            Guru::class,
            Siswa::class,
            Operator::class,
            kategori::class,
            informasi::class,
        ]);
    }
}
