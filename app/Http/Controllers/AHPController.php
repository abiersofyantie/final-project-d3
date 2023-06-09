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
        // dd($ahp[0]->fuzzyAhp->ahp_final);
        return view('data.ahp.proses-ahp', compact('ahp', 'bobot'));
    }
}
