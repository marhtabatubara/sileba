<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Seeder;

class MatpelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matpel = array(
            [
                'id' => '01',
                'nama_mapel' => 'Bahasa Indonesia',
                'deskripsi' => 'Tujuan pembelajaran Bahasa Indonesia ini
                diarahkan pada pengembangan kompetensi berbahasa dan bersastra
                peserta didik melalui kegiatan mendengarkan (listening), membaca
                (reading), memirsa (viewing), berbicara (speaking), dan menulis (writing)',
                'guru_id' => 1987081120,
                'kelas_id' => 01,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        foreach($matpel AS $e){
            MataPelajaran::create([
                'id' => $e['id'],
                'nama_mapel' => $e['nama_mapel'],
                'deskripsi' =>$e['deskripsi'],
                'guru_id' =>$e['guru_id'],
                'kelas_id' =>$e['kelas_id'],
                'created_at' =>$e['created_at'],
                'updated_at' =>$e['updated_at'],
            ]);
        }
    }
}
