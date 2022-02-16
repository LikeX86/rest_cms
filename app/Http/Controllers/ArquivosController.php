<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Arquivos;
use App\Models\ConfigGeral;

class ArquivosController extends Controller
{
    public function index()
    {
      $config_geral = ConfigGeral::all();
      return view('usuarios.arquivos.index',['config_geral'=>$config_geral])->with('arquivos', Arquivos::get());
    }

    public function store(Request $request)
    {
      $request->validate([
          'arquivo' => 'required',
      ]);

      $arquivo = new Arquivos;
      if(is_null($request->input('nome'))){
        $arquivo->nome = str_replace('.'.$request->arquivo->extension(),'',$request->arquivo->getClientOriginalName());
      }else{
        $arquivo->nome = $request->input('nome');
      }
      $arquivo->tamanho = $request->arquivo->getSize();
      $arquivo->tipo = $request->arquivo->extension();
      $arquivo->caminho = 'assets/arquivos/'.$request->arquivo->storeAs('', str::slug($arquivo->nome).'.'.$arquivo->tipo, 'upl_arquivos');
      $arquivo->save();

      return back()->with('mensagem', "Uplaod do arquivo '{$arquivo->nome}' realizado com sucesso.");
    }
}
