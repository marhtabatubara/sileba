<?php

namespace Database\Seeders;

use App\Models\Operator;
use Illuminate\Database\Seeder;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operator = array(
            [
                'id_operator' => '01',
                'nama' => 'Junita Lestari Siahaan, S.E',
                'email' => 'junita@gmail.com',
                'jenis_kelamin' => 'p',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_operator' => '02',
                'nama' => 'Emelia Simaremare, S.Pd',
                'email' => 'emelia@gmail.com',
                'jenis_kelamin' => 'p',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        foreach($operator AS $e){
            Operator::create([
                'id_operator' => $e['id_operator'],
                'nama' => $e['nama'],
                'email' =>$e['email'],
                'jenis_kelamin' =>$e['jenis_kelamin'],
                'created_at' =>$e['created_at'],
                'updated_at' =>$e['updated_at'],
            ]);
        }
    }
}
