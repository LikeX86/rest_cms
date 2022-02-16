<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\ConfigGeral;

class PostsController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    public function index(){
      $config_geral = ConfigGeral::all();
        $posts = Posts::all();
        return view('posts',['posts' => $posts],['config_geral'=>$config_geral]);
    }

    public function addPost(Request $request){
        $rules=[
            'titulo' => 'required|min:2',
            'subtitulo' => 'required|min:2',
            'imagem'=>'required|mimes:jpg,png,gif,svg',
            'descricao' => 'required|min:20',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('posts')->withErrors($validator);
        }

         if($request->hasFile('imagem')){
            if($request->file('imagem')->isValid()){
                $imagem = $request->file('imagem')->store('upl_posts');
                $url = Storage::url($imagem);

                $Posts = new Posts();
                $Posts->titulo = $request->input('titulo');
                $Posts->subtitulo = $request->input('subtitulo');
                $Posts->imagem = $url;
                $Posts->descricao = $request->input('descricao');
                $Posts->save();
               
                return redirect()->route('posts');
            }
        }
    }

    public function editPost(Request $request, $id){
        $posts = Posts::find($id);

        $rules=[
            'titulo' => 'required|min:2',
            'subtitulo' => 'required|min:2',
            'imagem'=>'required|mimes:jpg,png,gif,svg',
            'descricao' => 'required|min:20',

        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('posts')->withErrors($validator);
        }

         if($request->hasFile('imagem')){
            if($request->file('imagem')->isValid()){
                $imagem_atual = explode('/',$posts->imagem);
                unlink(public_path('assets/posts/'.$imagem_atual[2]));
                
                $imagem = $request->file('imagem')->store('upl_posts');
                $url = Storage::url($imagem);

                $Posts = new Posts();
                $Posts->titulo = $request->input('titulo');
                $Posts->descricao = $request->input('subtitulo');
                $Posts->imagem = $url;
                $Posts->descricao = $request->input('descricao');

                $Posts->save();
               
                return redirect()->route('posts');
            }
        
    }
        $posts->titulo = $request->input('titulo');
        $posts->descricao = $request->input('subtitulo');
        $posts->descricao = $request->input('descricao');
        $posts->save();
        return redirect()->route('posts');
    }

    public function deletePost(Request $request){
        $id = intval($request->input('id'));
        $post = Posts::find($id);

        $imagem = explode('/',$post->imagem);
        unlink(storage_path('app/public/'.$imagem[2]));

        Posts::where('id', $id)->delete();
        return redirect()->route('posts');
    }

}
