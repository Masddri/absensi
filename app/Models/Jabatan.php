<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    public $fillable = ['nama_jabatan'];
    public $visible = ['nama_jabatan'];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'id_jabatan');
    }
}
