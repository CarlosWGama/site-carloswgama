<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Site
Route::get('/', 'HomeController@index')->name('home');

//Login
Route::get('login','LoginController@index')->name('login');
Route::post('login/logon','LoginController@logon')->name('login.logon');
Route::delete('login/logout','LoginController@logout')->name('logout');

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    //Dashboard
    Route::get('dashboard','Admin\DashboardController@index')->name('admin.dashboard');

    //Usuários
    Route::group(['prefix' => 'usuarios'], function() {
        Route::get('novo', 'Admin\UsuariosController@novo')->name('admin.usuarios.novo');
        Route::post('cadastrar', 'Admin\UsuariosController@cadastrar')->name('admin.usuarios.cadastrar');
        Route::get('listar', 'Admin\UsuariosController@listar')->name('admin.usuarios.listar');
        Route::get('editar/{id}', 'Admin\UsuariosController@editar')->name('admin.usuarios.editar');
        Route::put('atualizar/{id}', 'Admin\UsuariosController@atualizar')->name('admin.usuarios.atualizar');
        Route::delete('excluir/{id}', 'Admin\UsuariosController@excluir')->name('admin.usuarios.excluir');
    });


    //Header
    Route::group(['prefix' => 'header'], function() {
        //Rede Social
        Route::group(['prefix' => 'redes-sociais'], function() {
            Route::get('novo', 'Admin\SocialController@novo')->name('admin.header.social.novo');
            Route::post('cadastrar', 'Admin\SocialController@cadastrar')->name('admin.header.social.cadastrar');
            Route::get('listar', 'Admin\SocialController@listar')->name('admin.header.social.listar');
            Route::get('editar/{id}', 'Admin\SocialController@editar')->name('admin.header.social.editar');
            Route::put('atualizar/{id}', 'Admin\SocialController@atualizar')->name('admin.header.social.atualizar');
            Route::delete('excluir/{id}', 'Admin\SocialController@excluir')->name('admin.header.social.excluir');
        });

        //Slide Header
        Route::group(['prefix' => 'slide'], function() {
            Route::get('novo', 'Admin\SlideController@novo')->name('admin.header.slides.novo');
            Route::post('cadastrar', 'Admin\SlideController@cadastrar')->name('admin.header.slides.cadastrar');
            Route::get('listar', 'Admin\SlideController@listar')->name('admin.header.slides.listar');
            Route::get('editar/{id}', 'Admin\SlideController@editar')->name('admin.header.slides.editar');
            Route::put('atualizar/{id}', 'Admin\SlideController@atualizar')->name('admin.header.slides.atualizar');
            Route::delete('excluir/{id}', 'Admin\SlideController@excluir')->name('admin.header.slides.excluir');
        });
    });
});
