<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Guru::factory(10)->create();
        // \App\Models\Operator::factory(10)->create();
        // \App\Models\Siswa::factory(10)->create();
        $this->call([
            GuruSeeder::class,
            SiswaSeeder::class,
            OperatorSeeder::class,
            PenggunaSeeder::class,
            KelasSeeder::class,
            MatpelSeeder::class,
        ]);
    }
}
