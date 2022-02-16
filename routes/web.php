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
use App\Http\Controllers\DadosController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ConfigGeralController;
use App\Http\Controllers\ArquivosController;






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
    Route::get('/home', [AdminController::class, 'index'])->name('admin');
    Route::get('/sobre', [SobreController::class, 'index'])->name('painel-sobre');
    Route::get('/graficos', [DadosController::class, 'index'])->name('Graficos');
    

    Route::middleware(['level:1'])->group(function () {
   
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
    Route::put('/site/editar-portfolio/{id}',[PortfolioController::class, 'editPortfolio'])->name('editar-portfolio');
    Route::delete('/portfolio/portfolios/delete', [PortfolioController::class, 'deletePortfolio'])->name('delete-portfolio');
    // Sobre
    Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');
    Route::put('/sobre/editar-sobre/{id}', [SobreController::class, 'editSobre'])->name('editar-sobre');
    // Perfil
    Route::get('/perfil', [AdminProfileController::class, 'index'])->name('perfil');
    Route::put('/perfil/editar-perfil/{id}', [AdminProfileController::class, 'editprofile'])->name('editar-perfil');
    // Usuarios
    Route::get('/usuariosdb',[AdminController::class,'users']);
    Route::get('/usuariosdb/delete/{id}',[AdminController::class,'delete_user']);

    // Posts
    Route::get('/posts', [PostsController::class, 'index']);
    Route::post('/posts/add',[PostsController::class, 'addPost']);
    Route::put('/posts/editar-portfolio/{id}',[PostsController::class, 'editPost']);
    Route::put('/portfolio/portfolios/delete/{id}', [PostsController::class, 'deletePost']);
    
    //Routes - Todos os usuários de level:0(Leitor)

      Route::get('/configuracoes',[UserController::class,'config']);
      Route::post('/configuracoes',[UserController::class,'config_update']);
    //Routes - Todos os usuários de level:1(Revisor)

      Route::get('/categorias',[CategoriasController::class,'index']);
      Route::get('/tags',[TagsController::class,'index']);
    });


    // Routes - Todos os usuários de level:3(Admin)
    Route::middleware(['level:2'])->group(function () {

      // Grupo
      Route::controller(UserController::class)->group(function (){
        Route::get('/criar-usuario',[UserController::class,'create']);
        Route::post('/criar-usuario',[UserController::class,'store']);
  
        Route::get('/listar-usuarios/{filtro?}','index');
        Route::get('/deletar-usuario/{id}','destroy');
  
        Route::get('/listar-usuarios/{filtro?}',[UserController::class,'index']);
        Route::get('/deletar-usuario/{id}',[UserController::class,'destroy']);
      });
    
      
      // Demais Classes

      Route::post('/categorias',[CategoriasController::class,'store']);
      Route::post('/categorias/editar',[CategoriasController::class,'update']);
      Route::get('/categorias/deletar/{id}',[CategoriasController::class,'destroy']);

      Route::post('/tags',[TagsController::class,'store']);
      Route::post('/tags/editar',[TagsController::class,'update']);
      Route::get('/tags/deletar/{id}',[TagsController::class,'destroy']);

      Route::get('/upload-arquivos',[ArquivosController::class,'index']);
      Route::post('/upload-arquivos',[ArquivosController::class,'store']);
    });



});
/*
    // Routes - Todos os usuários de level:3(Admin)
    Route::middleware(['level:3'])->group(function () {

      // Grupo
      Route::controller(UserController::class)->group(function (){
        Route::get('/criar-usuario',[UserController::class,'create']);
        Route::post('/criar-usuario',[UserController::class,'store']);
  
        Route::get('/listar-usuarios/{filtro?}','index');
        Route::get('/deletar-usuario/{id}','destroy');
  
        Route::get('/criar-usuario','create');
        Route::post('/criar-usuario','store');
  
        Route::get('/listar-usuarios/{filtro?}','index');
        Route::get('/deletar-usuario/{id}','destroy');
      });
      
      
      */