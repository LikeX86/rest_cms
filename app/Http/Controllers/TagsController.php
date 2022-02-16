<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// ----------------
use App\Models\Tags;
use App\Models\ConfigGeral;

class TagsController extends Controller
{
    public function index()
    {
      $config_geral = ConfigGeral::all();
        return view('usuarios.tags.index',['config_geral'=>$config_geral])->with("tags",Tags::get());
    }

    public function store(Request $request)
    {
      $request->validate([
          'tags' => 'required|min:1',
      ]);

      $temp_tags = explode(",",$request->input('tags'));
      foreach ($temp_tags as $key => $tag) {
        $nova_tag = new Tags;
        $nova_tag->nome = $tag;
        $nova_tag->slug = str::slug($tag);
        $nova_tag->save();
      }

      return back()->with('mensagem', 'Tags criada com sucesso.');
    }

    public function update(Request $request)
    {
      $request->validate([
          'tag' => 'required|min:1',
      ]);

      $tag = Tags::find($request->input('id'));
      $tag->nome = $request->input('tag');
      $tag->save();

      return back()->with('mensagem', 'Tags editada com sucesso.');;
    }

    public function destroy($id)
    {
      Tags::find($id)->delete();
      return back()->with('mensagem', 'Tags deletada com sucesso.');;
    }
}
