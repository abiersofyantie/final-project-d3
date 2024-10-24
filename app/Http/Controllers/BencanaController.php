<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use App\Models\Kabupaten;
use App\Models\FuzzyAhp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data.bencana.bencana', [
            'bencana' => Bencana::orderBy('id', 'desc')->paginate(20)->withQueryString(),
            'kabupaten' => Kabupaten::all()
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
        $gerakanTanah = $request->gerakan_tanah;
        $totalGerakanTanah = DB::table('bencana')->sum('gerakan_tanah') + $request->gerakan_tanah;

        if($totalGerakanTanah == 0) {
            $totalGerakanTanah = 1;
        }
        $normalisasiGerakanTanah = $gerakanTanah/$totalGerakanTanah;

        // dd($totalGerakanTanah);

        Bencana::create([
            'kabupaten_id' => $request->kabupaten_id,
            'alamat_bencana' => $request->alamat,
            'tanggal_bencana' => $request->tanggal,
            'waktu_bencana' => $request->waktu,
            'gerakan_tanah' => $request->gerakan_tanah,
        ]);

        if(!app(FuzzyMLController::class)->fuzzyTrigger()){
            return back()->with('succes', 'Data berhasil ditambahkan, Fuzzy tidak terupdate!');
        }

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
        $gerakanTanahLama = DB::table('bencana')->where('id', $id)->value('gerakan_tanah');

        Bencana::where('id', $id)->update([
            'kabupaten_id' => $request->kabupaten_id,
            'alamat_bencana' => $request->alamat,
            'tanggal_bencana' => $request->tanggal,
            'waktu_bencana' => $request->waktu,
            'gerakan_tanah' => $request->gerakan_tanah,
        ]);

        $gerakanTanah = $request->gerakan_tanah;
        $totalGerakanTanah = DB::table('bencana')->sum('gerakan_tanah') - $gerakanTanahLama + $gerakanTanah  ;

        if($totalGerakanTanah == 0) {
            $totalGerakanTanah = 1;
        }
        $normalisasiGerakanTanah = $gerakanTanah/$totalGerakanTanah;

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
        Bencana::destroy($id);
        // $id_kabupaten = Bencana::where('id', $id)->value(kabupaten_id);
        // //dd($id_kabupaten);

        // FuzzyAhp::where('id_kabupaten', $id_kabupaten);

        if(!app(FuzzyMLController::class)->fuzzyTrigger()){
            return back()->with('succes', 'Data berhasil ditambahkan, Fuzzy tidak terupdate!');
        }

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
