<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
    use HasFactory;
    protected $fillable = ['id_card', 'nama_karyawan', 'jk', 'no_hp', 'tmp_lahir', 'tgl_lahir', 'foto'];
    protected $table = 'karyawan';
}
