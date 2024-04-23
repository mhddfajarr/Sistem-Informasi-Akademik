<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    protected $guarded = ['id'];
    public $timestamps = false;
}
