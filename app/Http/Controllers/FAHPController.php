<?php

namespace App\Http\Controllers;

use App\Models\FuzzyAhp;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class FAHPController extends Controller
{
    public function index()
    {
        $fahp = Kabupaten::all();
        $bobot = FuzzyAhp::all();
        return view('data.fahp.proses-fahp', compact('fahp', 'bobot'));
    }
}
