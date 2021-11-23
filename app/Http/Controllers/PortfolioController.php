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
            'imagem'=>'required','mimes:jpg,png,gif,svg'
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
                $portfolios->imagem = $url;
                $portfolios->save();
               
                return redirect()->route('portfolio');
            }
        }
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

