<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DownloadController extends Controller
{
    //
    public function downloadfunc(){
        $downloads=DB::table('downloadpdf')->get();
        return view('download.viewfile',compact('downloads'));
    }
}
