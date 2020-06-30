<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function resultShow() {
        $results = Result::latest()->paginate(20);
        return view('admin.result.result', ['results' => $results]);
    }

    public function csvFileDownload() {
        $results = Result::latest()->get();

        $csvExporter = new \Laracsv\Export();

        if($results->count() > 0){
            $csvExporter->build($results,['name','email','quize_name','right_answer','wrong_answer','get_points','created_at']);

            return $csvExporter->download("result".now().'.csv');
            return back();
        }

        return back()->with('wrong','There is no result for download.. :(');

    }
}
