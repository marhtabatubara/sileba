<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $kelas = array(
            [
                'id' => '01',
                'kode_kelas' => 'X-TataBoga-1',
                'tahun' => '2021/2022',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '02',
                'kode_kelas' => 'X-Perhotelan-1',
                'tahun' => '2021/2022',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        foreach($kelas AS $e){
            Room::create([
                'id' => $e['id'],
                'kode_kelas' => $e['kode_kelas'],
                'tahun' =>$e['tahun'],
                'created_at' =>$e['created_at'],
                'updated_at' =>$e['updated_at'],
            ]);
        }
    }
}
