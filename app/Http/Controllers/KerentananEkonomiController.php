<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\KerentananEkonomi;
use Illuminate\Http\Request;

class KerentananEkonomiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data.kerentanan.ekonomi.kerentanan-ekonomi', [
            'ekonomi' => KerentananEkonomi::orderBy('kabupaten_id', 'asc')->paginate(20)->withQueryString(),
            'kabupaten' => Kabupaten::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $total = ((0.6 * (float) $request->lahan) +(0.4 * (float) $request->pdrb));
        KerentananEkonomi::create([
            'kabupaten_id' => $request->kabupaten_id,
            'luas_lahan_produktif' => $request->lahan,
            'luas_pdrb' => $request->pdrb,
            'hasil_kereneko' => $total
        ]);

        if(!app(FuzzyMLController::class)->fuzzyTrigger()){
            return back()->with('succes', 'Data berhasil ditambahkan, Fuzzy tidak terupdate!');
        }

        return back()->with('succes', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KerentananEkonomi $kerentananEkonomi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KerentananEkonomi $kerentananEkonomi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        KerentananEkonomi::where('id', $id)->update([
            'kabupaten_id' => $request->kabupaten_id,
            'luas_lahan_produktif' => $request->lahan,
            'luas_pdrb' => $request->pdrb,

        ]);

        if(!app(FuzzyMLController::class)->fuzzyTrigger()){
            return back()->with('succes', 'Data berhasil ditambahkan, Fuzzy tidak terupdate!');
        }

        return back()->with('succes', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KerentananEkonomi::destroy($id);

        if(!app(FuzzyMLController::class)->fuzzyTrigger()){
            return back()->with('succes', 'Data berhasil ditambahkan, Fuzzy tidak terupdate!');
        }

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
