<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerentananLingkungan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kerentanan_lingkungan';
    protected $fillable = [
        'kabupaten_id',
        'hutan_lindung',
        'hutan_alam',
        'hutan_bakau',
        'semak_belukar',
        'hasil_kerenling',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
}
