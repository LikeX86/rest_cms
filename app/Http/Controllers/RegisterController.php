<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }


    public function register(Request $request){
        $data = $request->only([
            'name',
            'email',
            'password', 
            'password_confirmation'
        ]);

        $validator = Validator::make($data,[
            'name'=>['required', 'string'],
            'email'=>['required','string','email','unique:users'],
            'password'=>['required', 'string','min:4','confirmed']
        ]);


        if($validator->fails()){
            return redirect()->route('register')->withErrors($validator)->withInput();
        }else{
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();
            return redirect()->route('login');
        }
    }
}
