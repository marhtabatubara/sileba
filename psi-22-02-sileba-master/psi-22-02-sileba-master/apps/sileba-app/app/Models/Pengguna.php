<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Authenticatable
{
    protected $table = "pengguna";
    protected $primaryKey = "id_pengguna";
    public $timestamps = false;
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'id_pengguna',
        'role',
        'password',
        'nip',
        'nisn',
        'id_operator',
    ];

    protected $hidden = [
        'password',
    ];

    public function getRouteKeyName(){
        return 'id_pengguna';
    }

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }

    public function guru(){
        return $this->belongsTo(Guru::class, 'nip', 'nip');
    }

    public function operator(){
        return $this->belongsTo(Operator::class, 'id_operator', 'id_operator');
    }
}
