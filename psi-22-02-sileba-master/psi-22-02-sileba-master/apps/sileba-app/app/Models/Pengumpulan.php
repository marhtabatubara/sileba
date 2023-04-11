<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    use HasFactory;
    public $table = "pengumpulan_tugas";
    public $timestamps = false;
    public function tugas(){
        return $this->belongsTo(Tugas::class, 'tugas_id','id');
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'nisn','nisn');
    }
}
