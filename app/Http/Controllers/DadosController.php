<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SitePortfolio;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


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
