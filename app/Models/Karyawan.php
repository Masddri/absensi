<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'jenis_kelamin', 'id_jabatan'];
    public $timestamp = true;

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
