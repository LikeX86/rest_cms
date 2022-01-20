<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SiteServico;
use App\Models\ItemServico;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class WhatwedoController extends Controller
{
    public function index(){
        $site_servicos = SiteServico::all();
        return view('whatwedo',['site_servicos' => $site_servicos]);
    }

    public function addServico(Request $request){
        $rules=[
            'titulo' => 'required|min:2',
            'imagem'=>'required','mimes:jpg,png,gif,svg',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('whatwedo')->withErrors($validator);
        }

         if($request->hasFile('imagem')){
            if($request->file('imagem')->isValid()){

                $imagem = $request->file('imagem')->store('public');
                $url = Storage::url($imagem);

                $servicos = new SiteServico();
                $servicos->titulo = $request->input('titulo');
                $servicos->imagem = $url;
                $servicos->save();
               
                return redirect()->route('whatwedo');
                
            }
        }



    }

    public function addItens(Request $request){

         $rules=[
            'descricao' => 'required|min:2','string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('site')->withErrors($validator);
        }

        $item = new ItemServico();
        $item->site_servicos_id = intval($request->input('idServico'));
        $item->descricao = $request->input('descricao');
        $item->save();
        return redirect()->route('whatwedo');

    }

    public function deleteServico(Request $request){
        $id = intval($request->input('id'));
        $servico = SiteServico::find($id);

        $imagem = explode('/',$servico->imagem);
        unlink(storage_path('app/public/'.$imagem[2]));

        SiteServico::where('id', $id)->delete();
        return redirect()->route('whatwedo');
    }
}