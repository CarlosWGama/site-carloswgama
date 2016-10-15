<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
* Controller das páginas do Administrador
*/
abstract class AdminController extends Controller {
    
    /**
    * Guarda os dados que são enviados para as páginas em comum
    * @access protected
    * @var array
    */
    protected $data = [];

    public function __construct() {

    }

    /**
    * Exibe a view com os dados contidos em data
    * @access protected
    */
    protected function view($page) {
        $this->getUserDatas();
        return view($page, $this->data);
    }

    /**
    * Busca as informações do usuário logado
    * @access private
    */
    private function getUserDatas() {
        if (Auth::check()) {
           $this->data['usuarioLogado'] = Auth::user();
        }
    }
}
