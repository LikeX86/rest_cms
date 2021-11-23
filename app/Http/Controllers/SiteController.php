<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteBanner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{
    public function index(){
        $site_banner = SiteBanner::all();

        return view('site',[
            'site_banner'=>$site_banner,
        ]);
    }

    public function editBanner(Request $request, $id){
        $site_banner = SiteBanner::find($id);
        

        $rules=[
            'texto-banner' => 'required|min:2',
            'imagem'=>'mimes:jpg,png,gif,svg'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('site')->withErrors($validator);
        }

        if($request->hasFile('imagem')){
            if($request->file('imagem')->isValid()){
                $imagem_atual = explode('/',$site_banner->imagem);
                unlink(storage_path('app/public/'.$imagem_atual[2]));
                
                $imagem = $request->file('imagem')->store('public');
                $url = Storage::url($imagem);
                $site_banner->texto_banner = $request->input('texto-banner');
                $site_banner->imagem = $url;
                $site_banner->save();
                return redirect()->route('site');
                
            }
        }
        
        $site_banner->texto_banner = $request->input('texto-banner');
        $site_banner->save();
        return redirect()->route('site');
       
    }


}