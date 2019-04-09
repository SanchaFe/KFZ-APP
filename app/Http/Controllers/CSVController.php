<?php

namespace App\Http\Controllers;

use \App\KFZ;
use Illuminate\Http\Request;

class CSVController extends Controller
{
    public function csvToArray($filename='', $delimiter=';')
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }
        return $data;
    }

    public function StoreCsv(Request $request)
    {
        $request->validate([
            'upload-file' => 'required|mimes:csv,vnd.ms-excel,txt'
        ]);
        $upload=$request->file('upload-file');
        $file=$upload->getRealPath();
        
        $customerArr = $this->csvToArray($file);
        //$kfz = KFZ::all();
        for ($i = 0; $i < count($customerArr); $i ++) {
            $kfz = KFZ::firstOrNew([
                'abk' => $customerArr[$i]['abk'],
                'stadt' => $customerArr[$i]['stadt'],
                'kreis' => $customerArr[$i]['kreis'],
                'land' => $customerArr[$i]['land'],
                ]);
            //dd($kfz);
            $kfz->save();
        }
        return back()->with('message', 'Submit was successful...');
    }

    public function getCSV()
    {
        $kfz = KFZ::get(); // All users
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($kfz, ['abk', 'stadt', 'kreis', 'land'])->download('kfzdaten.csv');
    }
}
