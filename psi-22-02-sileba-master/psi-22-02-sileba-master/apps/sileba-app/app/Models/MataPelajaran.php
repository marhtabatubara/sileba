<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table='mata_pelajaran';
    public $timestamps = false;

    public function guru(){
        return $this->belongsTo(Guru::class, 'guru_id', 'nip');
    }

    public function kelas(){
        return $this->belongsTo(Room::class, 'kelas_id', 'id');
    }
}
