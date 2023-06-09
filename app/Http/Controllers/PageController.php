<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bencana;
use App\Models\Kabupaten;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }

        return abort(404);
    }
}
