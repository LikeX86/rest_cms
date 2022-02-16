<?php

namespace App\Http\Controllers;

use App\Models\SiteBanner;
use App\Models\SiteServico;
use App\Models\SitePortfolio;
use App\Models\SiteSobre;
use App\Models\ConfigGeral;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Validator;




class HomeController extends Controller
{
    public function index(){
        $site_banner = SiteBanner::all();
        $site_servicos = SiteServico::all();
        $site_portfolios = SitePortfolio::all();
        $site_sobre = SiteSobre::all();
        $posts = Posts::all();
        $config_geral = ConfigGeral::all();

        return view('home',[        
         'site_banner'=>$site_banner,
         'site_servicos' => $site_servicos,
         'site_portfolios'=> $site_portfolios,
         'site_sobre'=> $site_sobre,
         'posts'=>$posts,
         'config_geral'=>$config_geral,
        ]);
        
    }

}