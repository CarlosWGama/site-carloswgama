<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Admin\AdminController;

use App\Models\Ano;
/**
* Controlador dos anos da bibliografia 
* @package Controller
* @subpackage Admin
*/
class AnosController extends AdminController {
    
    /**
    * Inicia cadastro de um ano
    */
    public function novo() {
        $this->data['ano'] = new Ano();
        return $this->view('admin.anos.novo');
    }

    /**
    * Tenta cadastrar um ano
    */
    public function cadastrar(Request $request) {
        $this->validate($request, [
            'descricao' => 'required|max:255',
            'ano'       => 'required|integer|max:2050|min:1990'
        ]);

        $ano = Ano::create($request->only('ano', 'descricao'));

        return redirect()->route('admin.biografia.anos.listar')->with('sucesso', 'Ano ' . $ano->ano . ' cadastrado com sucesso');
    }

    /**
    *Inicia edição de um ano
    */
    public function editar($id) {
        $this->data['ano'] = Ano::find($id);
        return $this->view('admin.anos.editar');
    }

    /**
    * Tenta atualizar um ano
    */
    public function atualizar(Request $request, $id) {
        $this->validate($request, [
            'descricao' => 'required|max:255',
            'ano'       => 'integer|max:2050|min:1990'
        ]);

        
        $ano = Ano::find($id);

        if (!empty($ano)) {
            $ano->update($request->only('ano', 'descricao'));
            return redirect()->route('admin.biografia.anos.listar')->with('sucesso', 'Ano ' . $ano->ano . ' atualizado com sucesso');
        }

        return redirect()->route('admin.biografia.anos.listar')->with('erro', 'Não foi possível encontrar o ano solicitado');
    }

    /** 
    * Exclui um ano
    */
    public function excluir($id) {
         $ano = Ano::find($id);

        if (!empty($ano)) {
            $ano->delete();
            return redirect()->route('admin.biografia.anos.listar')->with('sucesso', 'Ano ' . $ano->ano . ' excluído com sucesso');
        }

        return redirect()->route('admin.biografia.anos.listar')->with('erro', 'Não foi possível encontrar o ano solicitado');
    }

    /**
    * Lista todos os anos cadastrados
    */
    public function listar(Request $request) {
        $this->JS_alert = true;
        $this->data['anos'] = Ano::paginate(10);
        
        if ($request->session()->has('sucesso'))
            $this->data['sucesso_mensagem'] = $request->session()->get('sucesso');
        if ($request->session()->has('erro'))
            $this->data['erro_mensagem'] = $request->session()->get('erro');

        return $this->view('admin.anos.listar');
    }
}
