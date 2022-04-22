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

    /**
    * Informa qual o menu está selecionado
    * @var int
    */
    protected $menu = 0;
    /**
    * Informa qual o submenu está selecionado
    * @var int
    */
    protected $submenu = 0;

    /**
    * Libera o script de Alert
    * @access protected
    * @var booleana
    */
    protected $JS_alert = false;
    
    public function __construct() {

    }

    /**
    * Exibe a view com os dados contidos em data
    * @access protected
    */
    protected function view($page) {
        $this->getDefaultData();
        return view($page, $this->data);
    }

    /**
    * Busca as informações do usuário logado
    * @access private
    */
    private function getDefaultData() {
        //Usuário
        if (Auth::check()) {
           $this->data['usuarioLogado'] = session('usuario');
        }

        //Javascripts
        $this->data['JS'] = [
            'alert' => $this->JS_alert
        ];
        
        //Sidebar
        $this->data['sidebar'] = [
            'menu'      => $this->menu,
            'submenu'   => $this->menu.'_'.$this->submenu
        ];
    }
}
