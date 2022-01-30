<?php

namespace App\Http\Controllers;


class DadosController extends Controller
{
    //namespace App\Http\Controllers;
    public function __construct(){
        return $this->middleware('auth');
    }

    public function index(){
        return view('graficos');
    }
}
