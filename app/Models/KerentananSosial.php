<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerentananSosial extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kerentanan_sosial';
    protected $fillable = [
        'kabupaten_id',
        'kepadatan_penduduk',
        'rasio_jenis_kelamin',
        'rasio_kemiskinan',
        'rasio_orang_cacat',
        'rasio_kelompok_umur',
        'hasil_kerensos',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
}
