<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSobre;
use Illuminate\Support\Facades\Validator;
use App\Models\ConfigGeral;

class SobreController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    public function index(){
        $site_sobre = SiteSobre::all();
        $config_geral = ConfigGeral::all();

        return view('sobre',['site_sobre'=>$site_sobre],['config_geral'=>$config_geral]);
    }
    public function editSobre(Request $request, $id){
        $site_sobre = SiteSobre::find($id);
        
        $rules=[
            'titulo'=>'min:2,max:50',
            'texto'=>'required|min:2',

        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('sobre')->withErrors($validator);
        
        }
                $site_sobre->titulo_sobre = $request->input('titulo');
                $site_sobre->texto_sobre = $request->input('texto');
                $site_sobre->save();

                return redirect()->route('sobre');              
        
                $site_sobre->titulo_sobre = $request->input('titulo');
                $site_sobre->texto_sobre = $request->input('texto');

        $site_sobre->save();
        return redirect()->route('sobre');
       
    }



}
