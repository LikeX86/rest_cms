<?php

namespace App\Http\Controllers;

use App\Models\SiteBanner;
use App\Models\SiteServico;
use App\Models\SitePortfolio;
use App\Models\SiteSobre;


class HomeController extends Controller
{
    public function index(){
        $site_banner = SiteBanner::all();
        $site_servicos = SiteServico::all();
        $site_portfolios = SitePortfolio::all();
        $site_sobre = SiteSobre::all();

        return view('home',[
         'graficos',
         'site_banner'=>$site_banner,
         'site_servicos' => $site_servicos,
         'site_portfolios'=> $site_portfolios,
         'site_sobre'=> $site_sobre,
        ]);
    }
}
