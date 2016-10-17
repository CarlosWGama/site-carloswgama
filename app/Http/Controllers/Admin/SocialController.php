<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

use App\Models\Social;

/**
* Controlador das RedesSociais
*/
class SocialController extends AdminController {
    
    /**
    * Inicia cadastro de uma nova Rede Social
    */
    public function novo() {
        $this->data['social'] = new Social();
        return $this->view('admin.social.novo');
    }

    /**
    * Tenta cadastrar uma nova Rede Social
    */
    public function cadastrar(Request $request) {
        $this->validate($request, [
            'link'          => 'required|url',
            'class_icon'    => 'required',
            'lado'          => 'integer'
        ]);

        $social = Social::create($request->only('link', 'class_icon', 'lado'));
        return redirect()->route('admin.header.social.listar')->with('sucesso', 'Rede Social "' . $social->link . '" criada com sucesso');
    }

    /**
    * Lista as Redes Sociais cadastradas
    */
    public function listar(Request $request) {
        $this->JS_alert = true;
        $this->data['sociais'] = Social::paginate(10);
        
        if ($request->session()->has('sucesso'))
            $this->data['sucesso_mensagem'] = $request->session()->get('sucesso');
        if ($request->session()->has('erro'))
            $this->data['erro_mensagem'] = $request->session()->get('erro');

        return $this->view('admin.social.listar');
    }

    /**
    * Inicia edição de Rede Social
    */
    public function editar($id) {
        $this->data['social'] = Social::find($id);
        return $this->view('admin.social.editar');
    }

    /**
    * Tenta editar Rede Social
    */
    public function atualizar(Request $request, $id) {
        $this->validate($request, [
            'link'          => 'required|url',
            'class_icon'    => 'required',
            'lado'          => 'integer'
        ]);

        $social = Social::find($id);
        if (!empty($social)) {
            $social->update($request->only('link', 'class_icon', 'lado'));
            return redirect()->route('admin.header.social.listar')->with('sucesso', 'Rede Social "' . $social->link . '" atualizada com sucesso');
        }
        return redirect()->route('admin.header.social.listar')->with('erro', 'Não foi possível encontrar a rede social');
    }

    /**
    * Exclui Slide
    */
    public function excluir($id) {
        $social = Social::find($id);
        if (!empty($social)) {
            $social->delete();
             return redirect()->route('admin.header.social.listar')->with('sucesso', 'Rede Social "' . $social->link . '" atualizada com sucesso');
        }
        return redirect()->route('admin.header.social.listar')->with('erro', 'Não foi possível encontrar a rede social');
    }}
