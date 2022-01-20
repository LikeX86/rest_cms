<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SitePortfolio;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index(){
        $site_portfolios = SitePortfolio::all();
        return view('portfolio',['site_portfolios' => $site_portfolios]);
    }

    public function addPortfolio(Request $request){
        $rules=[
            'titulo' => 'required|min:2',
            'descricao' => 'required|min:2',
            'link' => 'required|min:2',
            'url_show' => 'max:500',
            'imagem'=>'required|mimes:jpg,png,gif,svg'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('portfolio')->withErrors($validator);
        }

         if($request->hasFile('imagem')){
            if($request->file('imagem')->isValid()){
                $imagem = $request->file('imagem')->store('public');
                $url = Storage::url($imagem);

                $portfolios = new SitePortfolio();
                $portfolios->titulo = $request->input('titulo');
                $portfolios->descricao = $request->input('descricao');
                $portfolios->link = $request->input('link');
                $portfolios->url_show = $request->input('url_show');
                $portfolios->imagem = $url;
                $portfolios->save();
               
                return redirect()->route('portfolio');
            }
        }
    }

    public function editPortfolio(Request $request, $id){
        $site_portfolios = SitePortfolio::find($id);

        $rules=[
            'titulo' => 'required|min:2',
            'descricao' => 'required|min:2',
            'link' => 'required|min:2',
            'url_show' => 'max:500',
            'imagem'=>'required','mimes:jpg,png,gif,svg'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('portfolio')->withErrors($validator);
        }

        if($request->hasFile('imagem')){
            if($request->file('imagem')->isValid()){
                $imagem_atual = explode('/',$site_portfolios->imagem);
                unlink(storage_path('app/public/'.$imagem_atual[2]));
                
                $imagem = $request->file('imagem')->store('public');
                $url = Storage::url($imagem);

                // $portfolios instancia do banco que vem do models/SitePortfolio
                $site_portfolios->titulo = $request->input('titulo');
                $site_portfolios->descricao = $request->input('descricao');
                $site_portfolios->link = $request->input('link');
                $site_portfolios->url_show = $request->input('url_show');
                $site_portfolios->imagem = $url;
                $site_portfolios->save();
                return redirect()->route('portfolio');

                
            }
        }  
        $site_portfolios->titulo = $request->input('titulo');
        $site_portfolios->descricao = $request->input('descricao');
        $site_portfolios->link = $request->input('link');
        $site_portfolios->url_show = $request->input('url_show');
        $site_portfolios->save();
        return redirect()->route('portfolio');
    }

    public function deletePortfolio(Request $request){
        $id = intval($request->input('id'));
        $portfolio = SitePortfolio::find($id);

        $imagem = explode('/',$portfolio->imagem);
        unlink(storage_path('app/public/'.$imagem[2]));

        SitePortfolio::where('id', $id)->delete();
        return redirect()->route('portfolio');
    }
}

