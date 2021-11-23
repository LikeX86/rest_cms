<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){
       $data = $request->only([
         'email',
         'password'
       ]);

       $validator = Validator::make($data,[
         'email'=> ['required','string', 'email'],
         'password'=> ['required', 'string', 'min:4']
       ]);

       $remember = $request->input('remember', false);

       if($validator->fails()){
            return redirect()->route('login')->withErrors($validator)->withInput();
       }

       if(Auth::attempt($data, $remember)){
            return redirect()->route('admin');
       }else{
            $validator->errors()->add('password', 'E-mail e/ou senha incorretos');
            return redirect()->route('login')->withErrors($validator)->withInput();
       }
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}


