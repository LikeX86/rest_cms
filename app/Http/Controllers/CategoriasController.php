<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Categorias;
use App\Models\ConfigGeral;

class CategoriasController extends Controller
{
    public function index()
    {
      $config_geral = ConfigGeral::all();
      return view('usuarios.categorias.index',['config_geral'=>$config_geral])->with('categorias',Categorias::all());
    }

    public function store(Request $request)
    {
      $request->validate([
          'nome' => 'required|unique:categorias|min:1',
          'cor' => 'required|min:1',
      ]);

      $categoria = new Categorias;
      $categoria->nome = $request->input('nome');
      $categoria->cor = $request->input('cor');
      $categoria->slug = str::slug($request->input('nome'));
      $categoria->save();

      return back()->with('mensagem', 'Categoria criada com sucesso.');
    }

    public function update(Request $request)
    {
      $request->validate([
          'nome' => 'required|min:1',
          'cor' => 'required|min:1',
      ]);

      $categoria = Categorias::find($request->input('id'));
      $categoria->nome = $request->input('nome');
      $categoria->cor = $request->input('cor');
      $categoria->slug = str::slug($request->input('nome'));
      $categoria->save();

      return back()->with('mensagem', 'Categoria editada com sucesso.');
    }

    public function destroy($id)
    {
      Categorias::find($id)->delete();

      return back()->with('mensagem', 'Categoria deletada com sucesso.');
    }
}
