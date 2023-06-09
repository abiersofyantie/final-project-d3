<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanahLongsor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tanah_longsor';
    // protected $fillable = [
    //     'kabupaten_id',
    //     'kerentanan_gerakan_tanah',
    //     'latitude',
    //     'longtitude',
    // ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
}
