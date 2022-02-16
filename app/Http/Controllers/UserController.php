<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ConfigGeral;


class UserController extends Controller
{

    public function index($filtro = null)
    {

      switch ($filtro) {
        case 'desativados':
          $user = User::onlyTrashed()->orderBy('name','asc')->get();
          break;

        default:
          $user = User::orderBy('name','asc')->get();
          break;
      }
      $config_geral = ConfigGeral::all();
      return view('usuarios.user.index',['config_geral'=>$config_geral])->with('users',$user);
    }

    public function create()
    {
      $config_geral = ConfigGeral::all();
      return view('usuarios.user.create',['config_geral'=>$config_geral]);
    }

    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
      ]);
      $user = new User;
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->level = $request->input('level');
      $user->password = bcrypt($request->input('password'));
      $user->save();
      $config_geral = ConfigGeral::all();
      return view('usuarios.user.create',['config_geral'=>$config_geral])->with('msg','Usuário Adicionado com Sucesso.');
    }

    public function destroy($id)
    {
      User::find($id)->delete();
      return back()->with('msg','Usuário Deletado Com Sucesso.');
    }

    public function config()
    {
      $config_geral = ConfigGeral::all();
      return view('usuarios.user.config',['config_geral'=>$config_geral]);
    }

    public function config_update(Request $request)
    {
   
      
      switch ($request->input('tipo')) {
        case 'avatar':
            $request->validate([
              'avatar' => 'required',
            ]);

            Storage::disk('upl_avatar')->put('avatar_'.Auth::user()->id.'.png', file_get_contents($request->file('avatar')));
            $user = User::find(Auth::user()->id);

            $user->avatar = url('assets/avatar/'.'avatar_'.Auth::user()->id.'.png');
            $user->save();

            return back()->with('msg', 'Avatar alterado com Sucesso.');
          break;

        case 'n.e.d':
          $user = User::find(Auth::user()->id);

          if(!is_null($request->input('nome'))){
            $user->name = $request->input('nome');
          }
          if(!is_null($request->input('email'))){
            $user->email = $request->input('email');
          }
          if(!is_null($request->input('descricao'))){
            $user->descricao = $request->input('descricao');
          }
          $user->save();

          return back()->with('msg', 'Alteração realizada com Sucesso.');
          break;

        case 'senha':
          $request->validate([
            'senha_atual' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
          ]);

          if(password_verify($request->input('senha_atual'),Auth::user()->password)){
            $user = User::find(Auth::user()->id);

            $user->password = bcrypt($request->input('password'));
            $user->save();

            return back()->with('msg', 'Senha Alterada com Sucesso.');
          }else{
            return back()->with('erro', 'Senha Atual não é compatível.');
          }

          break;
      }
    }
}
