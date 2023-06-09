<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerentananEkonomi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kerentanan_ekonomi';
    protected $fillable = [
        'kabupaten_id',
        'luas_lahan_produktif',
        'luas_pdrb',
        'hasil_kereneko',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
}
