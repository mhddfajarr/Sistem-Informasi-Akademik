<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function role()
    {
        return $this->hasMany(User::class);
    }

    protected $guarded = ['id'];
    public $timestamps = false;
}
