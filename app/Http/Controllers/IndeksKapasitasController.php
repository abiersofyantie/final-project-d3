<?php

namespace App\Http\Controllers;

use App\Models\IndeksKapasitas;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class IndeksKapasitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data.kapasitas.indeks-kapasitas', [
            'kapasitas' => IndeksKapasitas::orderBy('kabupaten_id', 'asc')->paginate(20)->withQueryString(),
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
        IndeksKapasitas::create([
            'kabupaten_id' => $request->kabupaten_id,
            'skor' => $request->skor,
        ]);

        return back()->with('succes', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        IndeksKapasitas::where('id', $id)->update([
            'kabupaten_id' => $request->kabupaten_id,
            'skor' => $request->skor,
        ]);

        return back()->with('succes', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        IndeksKapasitas::destroy($id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
