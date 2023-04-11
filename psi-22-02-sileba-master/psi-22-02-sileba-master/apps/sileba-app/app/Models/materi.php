<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    public $table ="materi_pembelajaran";

    public function matpel(){
        return $this->belongsTo(MataPelajaran::class, 'matpel_id', 'id');
    }
    
    public function kelas(){
        return $this->belongsTo(Room::class, 'kelas_id', 'id');
    }

    public function getFileAttribute(){
        return asset('storage/'. $this->berkas_materi);
    }
}
