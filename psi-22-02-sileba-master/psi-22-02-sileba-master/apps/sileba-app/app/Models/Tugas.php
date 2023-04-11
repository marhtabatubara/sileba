<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    public $table = 'tugas';
    public $timestamps = false;
    public function matpel(){
        return $this->belongsTo(MataPelajaran::class, 'matpel_id', 'id');
    }
    public function getFileAttribute(){
        return asset('storage/'. $this->berkas_tugas);
    }
}
