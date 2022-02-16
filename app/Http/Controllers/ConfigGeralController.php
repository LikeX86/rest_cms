<?php

namespace App\Http\Controllers;

use App\Models\ConfigGeral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConfigGeralController extends Controller
{
    //    
    public function index(){
        $config_geral = ConfigGeral::all();
        return view('paginas.admin',['config_geral'=>$config_geral]);
    }
}
