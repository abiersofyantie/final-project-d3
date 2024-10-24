<?php

namespace App\Http\Controllers;

use App\Models\FuzzyAhp;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class FuzzyController extends Controller
{
    public function index()
    {
        $fuzzy = Kabupaten::all();
        $bobot = FuzzyAhp::all();

        return view('data.fuzzy.proses-fuzzy', compact('fuzzy', 'bobot'));
    }
}