<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoarController extends Controller
{
    public function index()
    {
        return view('soar');
    }

    public function list(Request $request)
    {
        $sql=$request->input('sql','');

        $commend='echo '."'$sql'"." | ". storage_path('soar').' -report-type html';
        $res=shell_exec($commend);
        return view('soar',compact('res'));


    }
}
