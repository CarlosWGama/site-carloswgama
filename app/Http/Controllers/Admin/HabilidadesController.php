<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Habilidade;

/**
* Controlas as Habilidades
* @package Controller
* @subpackage Admin
*/
class HabilidadesController extends AdminController {
    
    /**
    * Inicia cadastro de uma nova Habilidade
    */
    public function nova() {
        $this->data['habilidade'] = new Habilidade();
        return $this->view('admin.habilidades.nova');
    }

    /**
    * Tenta cadastrar uma nova Habilidade
    */
    public function cadastrar(Request $request) {
        $this->validate($request, [
            'habilidade'    => 'required|max:15',
            'porcentagem'   => 'required|integer'
        ]);

        $habilidade = Habilidade::create($request->only('habilidade', 'porcentagem'));
        return redirect()->route('admin.biografia.habilidades.listar')->with('sucesso', 'Habilidade "' . $habilidade->habilidade . '" criada com sucesso');
    }

    /**
    * Lista as habilidades cadastradas
    */
    public function listar(Request $request) {
        $this->JS_alert = true;
        $this->data['habilidades'] = Habilidade::paginate(10);
        
        if ($request->session()->has('sucesso'))
            $this->data['sucesso_mensagem'] = $request->session()->get('sucesso');
        if ($request->session()->has('erro'))
            $this->data['erro_mensagem'] = $request->session()->get('erro');

        return $this->view('admin.habilidades.listar');
    }

    /**
    * Inicia edição de habilidade
    */
    public function editar($id) {
        $this->data['habilidade'] = Habilidade::find($id);
        return $this->view('admin.habilidades.editar');
    }

    /**
    * Tenta editar habilidade
    */
    public function atualizar(Request $request, $id) {
        $this->validate($request, [
            'habilidade'     => 'required|max:15',
            'porcentagem'    => 'required|integer'
        ]);

        $habilidade = Habilidade::find($id);
        if (!empty($habilidade)) {
            $habilidade->update($request->only('habilidade', 'porcentagem'));
            return redirect()->route('admin.biografia.habilidades.listar')->with('sucesso', 'Habilidade "' . $habilidade->habilidade . '" atualizada com sucesso');
        }
        return redirect()->route('admin.biografia.habilidades.listar')->with('erro', 'Não foi possível encontrar a habilidade');
    }

    /**
    * Exclui habilidade
    */
    public function excluir($id) {
        $habilidade = Habilidade::find($id);
        if (!empty($habilidade)) {
            $habilidade->delete();
             return redirect()->route('admin.biografia.habilidades.listar')->with('sucesso', 'Habilidade "' . $habilidade->habilidade . '" excluída com sucesso');
        }
        return redirect()->route('admin.biografia.habilidades.listar')->with('erro', 'Não foi possível encontrar a habilidade');
    }
}