<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    public $table = "guru";
    protected $primaryKey ="nip";

    public function pengguna(){
        return $this->belongsTo(Pengguna::class, 'nip', 'nip');
    }
}
