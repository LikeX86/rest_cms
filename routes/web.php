<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\WhatwedoController;
use App\Http\Controllers\PortfolioController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class, 'index']);


Route::prefix('painel')->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login-action');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register-action');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/sobre', [SobreController::class, 'index'])->name('painel-sobre');

    


    // ROTAS PARA A PÁGINA DO SITE
    Route::get('/site', [SiteController::class, 'index'])->name('site');
    Route::put('/site/editar-banner/{id}', [SiteController::class, 'editBanner'])->name('editar-banner');
    // O que Fazemos
    Route::get('/whatwedo', [WhatwedoController::class, 'index'])->name('whatwedo');
    Route::post('/whatwedo/servico/add',[WhatwedoController::class, 'addServico'])->name('cadastrar-servico');
    Route::post('/whatwedo/items/add', [WhatwedoController::class, 'addItens'])->name('cadastrar-itens');
    Route::delete('/whatwedo/servicos/delete', [WhatwedoController::class, 'deleteServico'])->name('delete-servico');
    //portfolio
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
    Route::post('/portfolio/add',[PortfolioController::class, 'addPortfolio'])->name('cadastrar-portfolio');
    Route::delete('/portfolio/delete', [PortfolioController::class, 'deletePortfolio'])->name('delete-portfolio');
});