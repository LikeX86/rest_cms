<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index(){
        $users = User::all();

        return view('perfil',[
            'users'=>$users,
        ]);
        
    }
    public function Editprofile(Request $request, $id){
        $users = User::find($id);

        $rules=[
            'name'=>'min:2',
            'email'=>'min:2',
            'password' => 'min:3',
            'imagem'=>'mimes:jpg,png,gif,svg'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->route('perfil')->withErrors($validator);
        }

        if($request->hasFile('imagem')){
            if($request->file('imagem')->isValid()){
                $imagem_atual = explode('/',$users->imagem);
                unlink(storage_path('app/public/icons'.$imagem_atual[2]));

                $imagem = $request->file('imagem')->store('public/icons');
                $url = Storage::url($imagem);

                $users = new User();
                $users->name = $request->input('name');
                $users->email = $request->input('email');
                $users->password = $request->input('password');
                $users->imagem = $url;
                $users->save();
               
                return redirect()->route('perfil');
                
            }
            
        }
        
    }
    
}
