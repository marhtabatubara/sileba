<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = array(
            [
                'nisn' => '3010120908',
                'nama' => 'Ari Taruna J. Simanjuntak',
                'alamat' => 'Tambunan',
                'jenis_kelamin' => 'l',
                'email' => 'aritaruna@gmail.com',
                'agama' => 'Katolik',
                'tgl_lahir' =>  '2005-12-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nisn' => '3010120999',
                'nama' => 'Nikita Natasya Hutapea',
                'alamat' => 'Laguboti',
                'jenis_kelamin' => 'p',
                'email' => 'nikita@gmail.com',
                'agama' => 'Kristen Protestan',
                'tgl_lahir' =>  '2005-10-10',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        foreach($siswa AS $e){
            Siswa::create([
                'nisn' => $e['nisn'],
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
