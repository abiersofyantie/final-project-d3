<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\KerentananLingkungan;
use Illuminate\Http\Request;

class KerentananLingkunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data.kerentanan.lingkungan.kerentanan-lingkungan', [
            'lingkungan' => KerentananLingkungan::orderBy('kabupaten_id', 'asc')->paginate(20)->withQueryString(),
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
        $total = ((0.4 * (float) $request->lindung) + (0.4 * (float) $request->alam) + (0.1 * (float) $request->bakau) + (0.1 * (float) $request->belukar));
        KerentananLingkungan::create([
            'kabupaten_id' => $request->kabupaten_id,
            'hutan_lindung' => $request->lindung,
            'hutan_alam' => $request->alam,
            'hutan_bakau' => $request->bakau,
            'semak_belukar' => $request->belukar,
            'hasil_kerenling' => $total
        ]);

        if(!app(FuzzyController::class)->fuzzyTrigger()){
            return back()->with('succes', 'Data berhasil ditambahkan, Fuzzy tidak terupdate!');
        }

        return back()->with('succes', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KerentananLingkungan $kerentananLingkungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KerentananLingkungan $kerentananLingkungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        KerentananLingkungan::where('id', $id)->update([
            'kabupaten_id' => $request->kabupaten_id,
            'hutan_lindung' => $request->lindung,
            'hutan_alam' => $request->alam,
            'hutan_bakau' => $request->bakau,
            'semak_belukar' => $request->belukar,
        ]);

        if(!app(FuzzyController::class)->fuzzyTrigger()){
            return back()->with('succes', 'Data berhasil ditambahkan, Fuzzy tidak terupdate!');
        }

        return back()->with('succes', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KerentananLingkungan::destroy($id);

        if(!app(FuzzyController::class)->fuzzyTrigger()){
            return back()->with('succes', 'Data berhasil ditambahkan, Fuzzy tidak terupdate!');
        }

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
