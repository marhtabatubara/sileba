<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    public $table = "siswa";
    protected $primaryKey = "nisn";

    public function pengguna(){
        return $this->belongsTo(Pengguna::class, 'nisn', 'nisn');
    }

    public function kelas(){
        return $this->belongsTo(Room::class, 'kelas_id', 'id');
    }
}
