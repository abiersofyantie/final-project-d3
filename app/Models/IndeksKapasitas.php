<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndeksKapasitas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'indeks_kapasitas';
    protected $fillable = [
        'kabupaten_id',
        'skor',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
}
