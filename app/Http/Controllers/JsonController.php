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

        if ($tipe == "ahp") {
            $color = Kabupaten::where('id', $id)->value('color_ahp');
            $status = Kabupaten::where('id', $id)->value('status_ahp');
            $bobot = Kabupaten::where('id', $id)->value('bobot_ahp');
        } else if ($tipe == "fuzzy") {
            $color = Kabupaten::where('id', $id)->value('color_fuzzy');
            $status = Kabupaten::where('id', $id)->value('status_fuzzy');
            $bobot = Kabupaten::where('id', $id)->value('bobot_fuzzy');
        } else if ($tipe == "fahp") {
            $color = Kabupaten::where('id', $id)->value('color_fahp');
            $status = Kabupaten::where('id', $id)->value('status_fahp');
            $bobot = Kabupaten::where('id', $id)->value('bobot_fahp');
        } 

        // Create an associative array with the color value
        $data = ['color' => $color, 'status' => $status, 'bobot' => $bobot];

        // Convert the array to JSON format
        $json = json_encode($data);

        // Return the JSON data
        return $json;
    }
}
