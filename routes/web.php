<?php

use App\Http\Controllers\Admin\AnosController;
use App\Http\Controllers\Admin\BiografiaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfoliosController;
use App\Http\Controllers\Admin\ServicosController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\TestemunhosController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



//Site
Route::controller(HomeController::class)
    ->group(function() {
        Route::get('/', 'index')->name('home');
        Route::get('/servico/{id}', 'servico')->name('servico');
        Route::get('/aplicativo/{id}', 'aplicativo')->name('aplicativo');
        Route::post('/email', 'email')->name('email');
    });

//Login
Route::controller(LoginController::class)
    ->group(function() {
        Route::get('login','index')->name('login');
        Route::post('login/logon','logon')->name('login.logon');
        Route::delete('login/logout','logout')->name('logout');
    });

//Admin
Route::middleware('admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            //Dashboard
            Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');

            //Usuários
            Route::controller(UsuariosController::class)
                    ->prefix('usuarios')
                    ->name('usuarios.')
                    ->group(function() {
                        Route::get('novo', 'novo')->name('novo');
                        Route::post('cadastrar', 'cadastrar')->name('cadastrar');
                        Route::get('listar', 'listar')->name('listar');
                        Route::get('editar/{id}', 'editar')->name('editar');
                        Route::put('atualizar/{id}', 'atualizar')->name('atualizar');
                        Route::delete('excluir/{id}', 'excluir')->name('excluir');
                    });
            

            //Header
            Route::prefix('header')
                    ->name('header.')
                    ->group(function() {
            
                    //Rede Social
                    Route::controller(SocialController::class)
                    ->prefix('redes-sociais')
                    ->name('social.')
                    ->group(function() {
                    
                        Route::get('novo', 'novo')->name('novo');
                        Route::post('cadastrar', 'cadastrar')->name('cadastrar');
                        Route::get('listar', 'listar')->name('listar');
                        Route::get('editar/{id}', 'editar')->name('editar');
                        Route::put('atualizar/{id}', 'atualizar')->name('atualizar');
                        Route::delete('excluir/{id}', 'excluir')->name('excluir');
                    });

                //Slide Header
                Route::controller(SlideController::class)
                 ->prefix('slides')
                 ->name('slides.')
                 ->group(function() {
                    Route::get('novo', 'novo')->name('novo');
                    Route::post('cadastrar', 'cadastrar')->name('cadastrar');
                    Route::get('listar', 'listar')->name('listar');
                    Route::get('editar/{id}', 'editar')->name('editar');
                    Route::put('atualizar/{id}', 'atualizar')->name('atualizar');
                    Route::delete('excluir/{id}', 'excluir')->name('excluir');
                });
            });

            //Biografia
            Route::prefix('biografia')
            ->name('biografia.')
            ->group(function() {
                Route::get('editar', [BiografiaController::class, 'editar'])->name('editar');
                Route::put('atualizar', [BiografiaController::class, 'atualizar'])->name('atualizar');
            
                //Anos
                Route::controller(AnosController::class)
                 ->prefix('anos')
                 ->name('anos.')
                 ->group(function() {
                    Route::get('novo', 'novo')->name('novo');
                    Route::post('cadastrar', 'cadastrar')->name('cadastrar');
                    Route::get('listar', 'listar')->name('listar');
                    Route::get('editar/{id}', 'editar')->name('editar');
                    Route::put('atualizar/{id}', 'atualizar')->name('atualizar');
                    Route::delete('excluir/{id}', 'excluir')->name('excluir');
                });

                //Habilidades
                Route::controller(AnosController::class)
                ->prefix('habilidades')
                ->name('habilidades.')
                ->group(function() {
                    Route::get('nova', 'nova')->name('nova');
                    Route::post('cadastrar', 'cadastrar')->name('cadastrar');
                    Route::get('listar', 'listar')->name('listar');
                    Route::get('editar/{id}', 'editar')->name('editar');
                    Route::put('atualizar/{id}', 'atualizar')->name('atualizar');
                    Route::delete('excluir/{id}', 'excluir')->name('excluir');
                });
            });

            //Portfólio
            Route::controller(PortfoliosController::class)
            ->prefix('portfolios')
            ->name('portfolios.')
            ->group(function() {
                Route::get('novo', 'novo')->name('novo');
                Route::post('cadastrar', 'cadastrar')->name('cadastrar');
                Route::get('listar', 'listar')->name('listar');
                Route::get('editar/{id}', 'editar')->name('editar');
                Route::put('atualizar/{id}', 'atualizar')->name('atualizar');
                Route::delete('excluir/{id}', 'excluir')->name('excluir');
            });

            //Serviço
            Route::controller(ServicosController::class)
            ->prefix('servicos')
            ->name('servicos.')
            ->group(function() {
                Route::get('novo', 'novo')->name('novo');
                Route::post('cadastrar', 'cadastrar')->name('cadastrar');
                Route::get('listar', 'listar')->name('listar');
                Route::get('editar/{id}', 'editar')->name('editar');
                Route::put('atualizar/{id}', 'atualizar')->name('atualizar');
                Route::delete('excluir/{id}', 'excluir')->name('.excluir');
                Route::get('fotos/{id}', 'fotos')->name('fotos');
                Route::post('fotos/{id}/cadastrar', 'fotosCadastrar')->name('fotos.cadastrar');
                Route::delete('fotos/{id}/excluir/{fotoID}', 'fotosExcluir')->name('fotos.excluir');
            });

            //Aplicativos
            Route::controller(AplicativosController::class)
            ->prefix('aplicativos')
            ->name('aplicativos.')
            ->group(function() {
                Route::get('novo', 'novo')->name('novo');
                Route::post('cadastrar', 'cadastrar')->name('cadastrar');
                Route::get('listar', 'listar')->name('listar');
                Route::get('editar/{id}', 'editar')->name('editar');
                Route::put('atualizar/{id}', 'atualizar')->name('atualizar');
                Route::delete('excluir/{id}', 'excluir')->name('excluir');
            });

            
            //Testemunhos
            Route::controller(TestemunhosController::class)
            ->prefix('testemunhos')
            ->name('testemunhos.')
            ->group(function() {
                Route::get('novo', 'novo')->name('novo');
                Route::post('cadastrar', 'cadastrar')->name('cadastrar');
                Route::get('listar', 'listar')->name('listar');
                Route::get('editar/{id}', 'editar')->name('editar');
                Route::put('atualizar/{id}', 'atualizar')->name('atualizar');
                Route::delete('excluir/{id}', 'excluir')->name('excluir');
            });
});
