<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kabupaten;

class Bencana extends Model
{
    use HasFactory;
    protected $table = 'bencana';
    protected $fillable = [
        'kabupaten_id',
        'alamat_bencana',
        'tanggal_bencana',
        'waktu_bencana',
        'gerakan_tanah',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
}
