<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'jenis_kegiatan', 'waktu', 'tanggal', 'gambar', 'keterangan', 'id_user'];
    protected $table = 'kegiatan';
    public $timestamps = false;

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
}
