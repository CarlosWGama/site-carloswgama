<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Admin\AdminController;

use App\Models\Slide;

class SlideController extends AdminController {
    
    /**
    * Inicia cadastro de um novo Slide
    */
    public function novo() {
        $this->data['slide'] = new Slide();
        return $this->view('admin.slides.novo');
    }

    /**
    * Tenta cadastrar um novo slide
    */
    public function cadastrar(Request $request) {
        $this->validate($request, [
            'descricao'     => 'required',
            'class_icon'    => 'required'
        ]);

        $slide = Slide::create($request->only('descricao', 'class_icon'));
        return redirect()->route('admin.header.slides.listar')->with('sucesso', 'Slide "' . $slide->descricao . '" criado com sucesso');
    }

    /**
    * Lista os Slides cadastrados
    */
    public function listar(Request $request) {
        $this->JS_alert = true;
        $this->data['slides'] = Slide::paginate(10);
        
        if ($request->session()->has('sucesso'))
            $this->data['sucesso_mensagem'] = $request->session()->get('sucesso');
        if ($request->session()->has('erro'))
            $this->data['erro_mensagem'] = $request->session()->get('erro');

        return $this->view('admin.slides.listar');
    }

    /**
    * Inicia edição de Slide
    */
    public function editar($id) {
        $this->data['slide'] = Slide::find($id);
        return $this->view('admin.slides.editar');
    }

    /**
    * Tenta editar Slide
    */
    public function atualizar(Request $request, $id) {
        $this->validate($request, [
            'descricao'     => 'required',
            'class_icon'    => 'required'
        ]);

        $slide = Slide::find($id);
        if (!empty($slide)) {
            $slide->update($request->only('descricao', 'class_icon'));
            return redirect()->route('admin.header.slides.listar')->with('sucesso', 'Slide "' . $slide->descricao . '" atualizado com sucesso');
        }
        return redirect()->route('admin.header.slides.listar')->with('erro', 'Não foi possível encontrar o slide');
    }

    /**
    * Exclui Slide
    */
    public function excluir($id) {
        $slide = Slide::find($id);
        if (!empty($slide)) {
            $slide->delete();
            return redirect()->route('admin.header.slides.listar')->with('sucesso', 'Slide "' . $slide->descricao . '" excluído com sucesso');
        }
        return redirect()->route('admin.header.slides.listar')->with('erro', 'Não foi possível encontrar o slide');
    }
}
