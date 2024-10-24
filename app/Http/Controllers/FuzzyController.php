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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Kabupaten::where('id', $id)->update([
            'bobot_fuzzy' => $request->bobot,
        ]);

        return back()->with('succes', 'Data berhasil diubah');
    }
}