<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    public $fillable = ['jam_masuk', 'jam_keluar'];
    public $visible = ['jam_masuk', 'jam_keluar'];

    public function Absensi()
    {
        return $this->belongsTo(Absensi::class, 'id_user');
    }
}
