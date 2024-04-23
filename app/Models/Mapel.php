<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    public function Nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    protected $guarded = ['id'];
    public $timestamps = false;
}
