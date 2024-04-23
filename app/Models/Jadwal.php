<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function Kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function Guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function Mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
