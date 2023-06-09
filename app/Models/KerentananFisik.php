<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerentananFisik extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kerentanan_fisik';
    protected $fillable = [
        'kabupaten_id',
        'rumah',
        'fasilitas_umum',
        'fasilitas_kritis',
        'hasil_kerenfis',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
}
