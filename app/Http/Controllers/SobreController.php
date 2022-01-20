<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSobre;
use Illuminate\Support\Facades\Validator;

class SobreController extends Controller
{
    public function index(){
        $site_sobre = SiteSobre::all();

        return view('sobre',[
            'site_sobre'=>$site_sobre,
        ]);
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
