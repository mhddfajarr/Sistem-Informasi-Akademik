<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function Mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    protected $guarded = ['id'];
    public $timestamps = false;
}
