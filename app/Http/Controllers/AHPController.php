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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Kabupaten::where('id', $id)->update([
            'bobot_ahp' => $request->bobot,
        ]);

        return back()->with('succes', 'Data berhasil diubah');
    }
}
