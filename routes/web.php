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
});
