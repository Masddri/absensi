<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    public $fillable = ['nama', 'id_jabatan', 'alamat', 'jenis_kelamin'];
    public $visible = ['nama', 'id_jabatan', 'alamat', 'jenis_kelamin'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
}
