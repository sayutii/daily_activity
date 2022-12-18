<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kegiatan', 'jenis_kegiatan', 'waktu_,mulai', 'waktu_selesai', 'tanggal_kegiatan', 'gambar', 'keterangan', 'id_user'];
    protected $table = 'kegiatan';
    public $timestamps = false;

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
}
