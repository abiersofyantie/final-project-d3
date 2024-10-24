<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\KerentananSosial;
use Illuminate\Http\Request;

class KerentananSosialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data.kerentanan.sosial.kerentanan-sosial', [
            'sosial' => KerentananSosial::orderBy('kabupaten_id', 'asc')->paginate(20)->withQueryString(),
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
        $total = ((0.6 * $request->penduduk) +(0.1 * $request->kelamin) + (0.1 * $request->kemiskinan) + (0.1 * $request->cacat) + (0.1 * $request->umur));
        KerentananSosial::create([
            'kabupaten_id' => $request->kabupaten_id,
            'kepadatan_penduduk' => $request->penduduk,
            'rasio_jenis_kelamin' => $request->kelamin,
            'rasio_kemiskinan' => $request->kemiskinan,
            'rasio_orang_cacat' => $request->cacat,
            'rasio_kelompok_umur' => $request->umur,
            'hasil_kerensos' => $total
        ]);

        if(!app(FuzzyMLController::class)->fuzzyTrigger()){
            return back()->with('succes', 'Data berhasil ditambahkan, Fuzzy tidak terupdate!');
        }

        return back()->with('succes', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KerentananSosial $kerentananSosial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KerentananSosial $kerentananSosial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        KerentananSosial::where('id', $id)->update([
            'kabupaten_id' => $request->kabupaten_id,
            'kepadatan_penduduk' => $request->penduduk,
            'rasio_jenis_kelamin' => $request->kelamin,
            'rasio_kemiskinan' => $request->kemiskinan,
            'rasio_orang_cacat' => $request->cacat,
            'rasio_kelompok_umur' => $request->umur,
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
        KerentananSosial::destroy($id);

        if(!app(FuzzyMLController::class)->fuzzyTrigger()){
            return back()->with('succes', 'Data berhasil ditambahkan, Fuzzy tidak terupdate!');
        }

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
