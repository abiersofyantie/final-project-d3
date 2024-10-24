<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
    Bencana,
    indeksKapasitas,
};

class Kabupaten extends Model
{
    use HasFactory;
    protected $table = 'kabupaten';
    public $timestamps = false;

    public function bencana()
    {
        return $this->hasMany(Bencana::class);
    }

    public function indeksKapasitas()
    {
        return $this->hasOne(IndeksKapasitas::class);
    }

    public function fuzzyAhp()
    {
        return $this->hasOne(FuzzyAhp::class,'id_kabupaten','id');
    }
}
