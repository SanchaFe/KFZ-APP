<?php

namespace App\Http\Controllers;

use \App\KFZ;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class KfzController extends Controller
{
    public function index()
    {
        $kfz = KFZ::all();

        return view('index', compact('kfz'));
    }

    public function ShowSerializer()
    {
        return view('serializer');
    }

    public function search() //Ist für die Suche in der Datenbank zuständig
    {
        $search = Input::get('search');
        if ($search != "") {
            $kfz = KFZ::where('abk', 'LIKE', '%'. $search .'%')
                        ->orWhere('stadt', 'LIKE', '%'. $search .'%')
                        ->orWhere('kreis', 'LIKE', '%'. $search .'%')
                        ->orWhere('land', 'LIKE', '%'. $search .'%')
                        ->get();
            if (count($kfz) > 0) {
                return view('index', compact('kfz', 'search'));
            }
        } elseif ($search == "") {
            $kfz = array();
            $search = "String is empty...";
        }
        return view('index', compact('kfz', 'search'));
    }
}
