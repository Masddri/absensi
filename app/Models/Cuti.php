<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    public $fillable = ['alasan', 'jumlah_cuti', 'tanggal_cuti','deskripsi','id_karyawan'];
    public $visible = ['nama_karyawan', 'jam_masuk', 'jam_keluar','id_karyawan'];

    public function Absensi()
    {
        return $this->belongsTo(Absensi::class, 'id_user');
    }

}
