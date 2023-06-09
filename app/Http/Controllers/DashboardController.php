<?php

namespace App\Http\Controllers;

use App\Models\TanahLongsor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $longsor = TanahLongsor::all();
        dd($longsor);
        return view('pages.dashboard');
    }
}
