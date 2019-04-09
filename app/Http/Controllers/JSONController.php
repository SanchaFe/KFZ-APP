<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\KFZ;

class JSONController extends Controller
{
    public function StoreJSON(Request $request)
    {
        $request->validate([
            'upload-file' => 'required|mimes:json,txt'
        ]);
        $upload=$request->file('upload-file');
        $file=$upload->getRealPath();
        // Read File
        $jsonString = file_get_contents($file);
        $data = json_decode($jsonString, true);
        for ($i = 0; $i < count($data); $i ++) {
            $kfz = KFZ::firstOrNew([
                'abk' => $data[$i]['abk'],
                'stadt' => $data[$i]['stadt'],
                'kreis' => $data[$i]['kreis'],
                'land' => $data[$i]['land'],
                ]);
            //dd($kfz);
            $kfz->save();
        }
        return back()->with('message', 'Submit was successful...');
    }

    public function getJSON()
    {
    }
}
