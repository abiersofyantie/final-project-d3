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

    function getColor(Request $request) {
        $tipe = $request->input('tipe');

        if ($tipe == "ahp")
            $color = Kabupaten::where('id', $request->input('id'))->value('color_ahp');
        if ($tipe == "fahp")
            $color = Kabupaten::where('id', $request->input('id'))->value('color_fahp');


        // Create an associative array with the color value
        $data = array('color' => $color);

        // Convert the array to JSON format
        $json = json_encode($data);

        // Return the JSON data
        return $json;
      }
}
