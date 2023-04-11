<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
    public $table = "operator_sekolah";
    protected $primaryKey = "id_operator";

    public function pengguna(){
        return $this->belongsTo(Pengguna::class, 'id_operator', 'id_operator');
    }

    public function getFileAttribute(){
        return asset('storage/'. $this->berkas_tugas);
    }
}
