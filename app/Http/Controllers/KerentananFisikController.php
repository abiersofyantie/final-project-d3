<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\KerentananFisik;
use Illuminate\Http\Request;

class KerentananFisikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data.kerentanan.fisik.kerentanan-fisik', [
            'fisik' => KerentananFisik::orderBy('kabupaten_id', 'asc')->paginate(20)->withQueryString(),
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
        $total = ((0.4 * $request->rumah) + (0.3 * $request->umum) + (0.3 * $request->kritis));
        KerentananFisik::create([
            'kabupaten_id' => $request->kabupaten_id,
            'fasilitas_umum' => $request->umum,
            'fasilitas_kritis' => $request->kritis,
            'rumah' => $request->rumah,
            'hasil_kerenfis' => $total
        ]);

        if(!app(FuzzyMLController::class)->fuzzyTrigger()){
            return back()->with('succes', 'Data berhasil ditambahkan, Fuzzy tidak terupdate!');
        }

        return back()->with('succes', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KerentananFisik $kerentananFisik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KerentananFisik $kerentananFisik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        KerentananFisik::where('id', $id)->update([
            'kabupaten_id' => $request->kabupaten_id,
            'fasilitas_umum' => $request->umum,
            'fasilitas_kritis' => $request->kritis,
            'rumah' => $request->rumah,
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
        KerentananFisik::destroy($id);

        if(!app(FuzzyMLController::class)->fuzzyTrigger()){
            return back()->with('succes', 'Data berhasil ditambahkan, Fuzzy tidak terupdate!');
        }

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
