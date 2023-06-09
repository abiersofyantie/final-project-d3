<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuzzyAhp extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'id_kabupaten',
        'nhazard',
        'nkerensos',
        'nkereneko',
        'nkerenfis',
        'nkerenling',
        'nindeks',
        'fuzzy_final',
        'ahazard',
        'akerensos',
        'akereneko',
        'akerenfis',
        'akerenling',
        'aindeks',
        'ahp_final',
        'fhazard',
        'fkerensos',
        'fkereneko',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class,'id_kabupaten','id');
    }
}
