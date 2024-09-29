<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    public $fillable = ['jam_masuk', 'jam_keluar', 'id_karyawan'];
    public $visible = ['jam_masuk', 'jam_keluar', 'id_karyawan'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
}
