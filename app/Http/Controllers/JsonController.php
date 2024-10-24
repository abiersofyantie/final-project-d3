<?php

namespace App\Http\Controllers;
use App\Models\Kabupaten;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class JsonController extends Controller
{
    public function index()
    {
        $file = File::get('public/jawa-timur.json');

        return $file;
    }

    function getColor(Request $request)
    {
        $tipe = $request->input('tipe');
        $id = $request->input('id');

        $colorOptions = [
            "Rendah" => "#32c256",
            "Sedang" => "#d4cc39",
            "Tinggi" => "#d64545"
        ];

        if ($tipe == "ahp") {
            $bobot = Kabupaten::where('id', $id)->value('bobot_ahp');

            if ($bobot >= 0.0385 && $bobot <= 0.0918) {
                $status = "Sedang";
            } else if ($bobot < 0.0385) {
                $status = "Rendah";
            } else if ($bobot > 0.0918) {
                $status = "Tinggi";
            }

            $color = $colorOptions[$status];
        } else if ($tipe == "fuzzy") {
            $bobot = Kabupaten::where('id', $id)->value('bobot_fuzzy');

            if ($bobot >= 0.0247 && $bobot <= 0.051) {
                $status = "Sedang";
            } else if ($bobot < 0.0247) {
                $status = "Rendah";
            } else if ($bobot > 0.051) {
                $status = "Tinggi";
            }

            $color = $colorOptions[$status];
        } else if ($tipe == "fahp") {
            $bobot = Kabupaten::where('id', $id)->value('bobot_fahp');

            if ($bobot >= 0.0247 && $bobot <= 0.051) {
                $status = "Sedang";
            } else if ($bobot < 0.0247) {
                $status = "Rendah";
            } else if ($bobot > 0.051) {
                $status = "Tinggi";
            }

            $color = $colorOptions[$status];
        } 

        // Create an associative array with the color value
        $data = ['color' => $color, 'status' => $status, 'bobot' => $bobot];

        // Convert the array to JSON format
        $json = json_encode($data);

        // Return the JSON data
        return $json;
    }
}
