<?php

namespace App\Http\Controllers;

use App\Models\FuzzyAhp;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class AHPController extends Controller
{
    public function index()
    {
        $ahp = Kabupaten::all();
        $bobot = FuzzyAhp::all();

        return view('data.ahp.proses-ahp', compact('ahp', 'bobot'));
    }
}
