<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guru = array(
            [
                'nip' => '1987081120',
                'nama' => 'Monita Sianipar',
                'alamat' => 'P.Siantar',
                'jenis_kelamin' => 'p',
                'email' => 'monitasianipar@gmail.com',
                'agama' => 'Kristen Protestan',
                'tgl_lahir' =>  '1987-08-11',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nip' => '1966112220',
                'nama' => 'Dra. Ren Sijabat',
                'alamat' => 'Tapanuli Utara',
                'jenis_kelamin' => 'l',
                'email' => 'rensijabat@gmailcom',
                'agama' => 'Kristen Protestan',
                'tgl_lahir' =>  '1996-11-22',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        foreach($guru AS $e){
            Guru::create([
                'nip' => $e['nip'],
                'nama' => $e['nama'],
                'alamat' => $e['alamat'],
                'jenis_kelamin' =>$e['jenis_kelamin'],
                'email' =>$e['email'],
                'agama' =>$e['agama'],
                'tgl_lahir' => $e['tgl_lahir'],
                'created_at' =>$e['created_at'],
                'updated_at' =>$e['updated_at'],
            ]);
        }
    }
}
