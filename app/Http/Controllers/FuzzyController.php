<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TempFuzzy
{
    public $id_kab;
    public $nC1;
    public $nC2;
    public $nC3;
    public $nC4;
    public $nC5;
    public $nC6;
    public $totalFz;

    public function __construct($id_kab, $nC1, $nC2, $nC3, $nC4, $nC5, $nC6, $totalFz)
    {
        $this->id_kab = $id_kab;
        $this->nC1 = $nC1;
        $this->nC2 = $nC2;
        $this->nC3 = $nC3;
        $this->nC4 = $nC4;
        $this->nC5 = $nC5;
        $this->nC6 = $nC6;
        $this->totalFz = $totalFz;
    }
}

class TempAhp
{
    public $id_kab;
    public $aC1;
    public $aC2;
    public $aC3;
    public $aC4;
    public $aC5;
    public $aC6;
    public $totalAhp;

    public function __construct($id_kab, $aC1, $aC2, $aC3, $aC4, $aC5, $aC6, $totalAhp)
    {
        $this->id_kab = $id_kab;
        $this->aC1 = $aC1;
        $this->aC2 = $aC2;
        $this->aC3 = $aC3;
        $this->aC4 = $aC4;
        $this->aC5 = $aC5;
        $this->aC6 = $aC6;
        $this->totalAhp = $totalAhp;
    }
}

class FuzzyController extends Controller
{
    // public function index()
    // {
    //     $fuzzy = Kabupaten::all();
    //     $bobot = FuzzyAhp::all();
    //     // dd($ahp);
    //     return view('data.ahp.proses-fahp', compact('fuzzy', 'bobot'));
    // }

    public function fuzzyTrigger()
    {
        $dataArr = [];

        try {
            $fuzzy = DB::table('fuzzy_ahps')->select('id_kabupaten')->get();

            $wc = [0, 0.034, 0.158, 0.158, 0.158, 0.158, 0.334];
            $wca = [0, 0.38481, 0.114062, 0.14062, 0.14062, 0.14062, 0.05272];

            foreach ($fuzzy as $fz) {
                $id = $fz->id_kabupaten;

                $C1fz = DB::table('tanah_longsor')->where('kabupaten_id', '=', $id)->selectRaw('SUM(kerentanan_gerakan_tanah) as sub_total, kerentanan_gerakan_tanah')->groupBy('kerentanan_gerakan_tanah')->first();
                $N1fz = $C1fz ? (($C1fz->kerentanan_gerakan_tanah / $C1fz->sub_total) * $wc[1]) : 0;
                $A1fz = $C1fz ? (($C1fz->kerentaanan_gerakan_tanah / $C1fz->sub_total) * $wca[1]) : 0;

                $C2fz = DB::table('kerentanan_sosial')->where('kabupaten_id', '=', $id)->selectRaw('SUM(hasil_kerensos) as sub_total, hasil_kerensos')->groupBy('hasil_kerensos')->first();
                $N2fz = $C2fz ? (($C2fz->hasil_kerensos / $C2fz->sub_total) * $wc[2]) : 0;
                $A2fz = $C2fz ? (($C2fz->hasil_kerensos / $C2fz->sub_total) * $wca[2]) : 0;

                $C3fz = DB::table('kerentanan_ekonomi')->where('kabupaten_id', '=', $id)->selectRaw('SUM(hasil_kereneko) as sub_total, hasil_kereneko')->groupBy('hasil_kereneko')->first();
                $N3fz = $C3fz ? (($C3fz->hasil_kereneko / $C3fz->sub_total) * $wc[3]) : 0;
                $A3fz = $C3fz ? (($C3fz->hasil_kereneko / $C3fz->sub_total) * $wca[3]) : 0;

                $C4fz = DB::table('kerentanan_fisik')->where('kabupaten_id', '=', $id)->selectRaw('SUM(hasil_kerenfis) as sub_total, hasil_kerenfis')->groupBy('hasil_kerenfis')->first();
                $N4fz = $C4fz ? (($C4fz->hasil_kerenfis / $C4fz->sub_total) * $wc[4]) : 0;
                $A4fz = $C4fz ? (($C4fz->hasil_kerenfis / $C4fz->sub_total) * $wca[4]) : 0;

                $C5fz = DB::table('kerentanan_lingkungan')->where('kabupaten_id', '=', $id)->selectRaw('SUM(hasil_kerenling) as sub_total, hasil_kerenling')->groupBy('hasil_kerenling')->first();
                $N5fz = $C5fz ? (($C5fz->hasil_kerenling / $C5fz->sub_total) * $wc[5]) : 0;
                $A5fz = $C5fz ? (($C5fz->hasil_kerenling / $C5fz->sub_total) * $wca[5]) : 0;

                $C6fz = DB::table('indeks_kapasitas')->where('kabupaten_id', '=', $id)->selectRaw('SUM(skor) as sub_total, skor')->groupBy('skor')->first();
                $N6fz = $C6fz ? (($C6fz->skor / $C6fz->sub_total) * $wc[6]) : 0;
                $A6fz = $C6fz ? (($C6fz->skor / $C6fz->sub_total) * $wca[6]) : 0;

                $totalFz = $N1fz + $N2fz + $N3fz + $N4fz + $N5fz + $N6fz;
                $totalAhp = $A1fz + $A2fz + $A3fz + $A4fz + $A5fz + $A6fz;

                $tempFuzzy = new TempFuzzy($id, $N1fz, $N2fz, $N3fz, $N4fz, $N5fz, $N6fz, $totalFz);
                $tempAhp = new TempAhp($id, $A1fz, $A2fz, $A3fz, $A4fz, $A5fz, $A6fz, $totalAhp);

                $dataArr[] = [
                    'fuzzy' => $tempFuzzy,
                    'ahp' => $tempAhp
                ];
            }
        } catch (Exception $e) {
            error_log("ERROR SELECTION");
            error_log($e);

            return false;
        }

        try {
            foreach ($dataArr as $data) {
                DB::table('fuzzy_ahps')
                    ->where('id', '=', $data["fuzzy"]->id_kab)
                    ->update([
                        'nhazard' => $data["fuzzy"]->nC1,
                        'nkerensos' => $data["fuzzy"]->nC2,
                        'nkereneko' => $data["fuzzy"]->nC3,
                        'nkerenfis' => $data["fuzzy"]->nC4,
                        'nkerenling' => $data["fuzzy"]->nC5,
                        'nindeks' => $data["fuzzy"]->nC6,
                        'fuzzy_final' => $data["fuzzy"]->totalFz,
                        'ahazard' => $data["ahp"]->aC1,
                        'akerensos' => $data["ahp"]->aC2,
                        'akereneko' => $data["ahp"]->aC3,
                        'akerenfis' => $data["ahp"]->aC4,
                        'akerenling' => $data["ahp"]->aC5,
                        'aindeks' => $data["ahp"]->aC6,
                        'ahp_final' => $data["ahp"]->totalAhp,
                    ]);
            }
        } catch (Exception $e) {
            error_log("ERROR UPDATE");
            error_log($e);

            return false;
        }

        return true;
    }
}
