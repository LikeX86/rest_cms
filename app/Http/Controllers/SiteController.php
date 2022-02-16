<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

// ------------------
use App\Models\SiteBanner;
use App\Models\ConfigGeral;

class SiteController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    public function index(){
        $site_banner = SiteBanner::all();
        $config_geral = ConfigGeral::all();

        return view('site'  ,['site_banner'=>$site_banner],['config_geral'=>$config_geral]);
    }

    public function editBanner(Request $request, $id){
        $site_banner = SiteBanner::find($id);
        

        $rules=[
            'banner-subt'=>'min:2',
            'banner-titulo'=>'required|min:2',
            'texto-banner' => 'min:2',
            'url_show' => 'max:500',
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
                $site_banner->texto_subt = $request->input('banner-subt');
                $site_banner->texto_titulo = $request->input('banner-titulo');
                $site_banner->texto_banner = $request->input('texto-banner');
                $site_banner->url_show = $request->input('url_show');
                $site_banner->imagem = $url;
                $site_banner->save();
                return redirect()->route('site');
                
            }
        }
        $site_banner->texto_subt = $request->input('banner-subt');
        $site_banner->texto_titulo = $request->input('banner-titulo');
        $site_banner->texto_banner = $request->input('texto-banner');
        $site_banner->url_show = $request->input('url_show');
        $site_banner->save();
        return redirect()->route('site');
       
    }


}