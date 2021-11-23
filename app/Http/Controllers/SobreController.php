<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSobre;


class SobreController extends Controller
{
    public function index(){
        $site_sobre = SiteSobre::all();

        return view('sobre',[
            'site_sobre'=>$site_sobre,
        ]);
    }
}
