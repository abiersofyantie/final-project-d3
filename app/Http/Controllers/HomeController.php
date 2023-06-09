<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use App\Models\TanahLongsor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $longsor = TanahLongsor::orderBy('created_at', 'desc')->paginate(20)->withQueryString();
        $bencana = Bencana::all();
        return view('pages.dashboard', compact('longsor', 'bencana'));
    }

}
