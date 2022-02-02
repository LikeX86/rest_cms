<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index(){
        return view('admin');
    }

  
        // Show all users
       public function users(){
            $data= User::orderBydesc("id","name")->get();
            return view('usuariosdb',['data'=>$data]);
        }
    
        public function delete_user($id){
            User::where('id',$id)->delete();
            return redirect()->route('admin');
        
        }
}
