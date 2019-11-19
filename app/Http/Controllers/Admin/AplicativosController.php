<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

use App\Models\Aplicativo;

class AplicativosController extends AdminController {
    
     /**
    * Inicia cadastro 
    */
    public function novo() {
        $this->data['aplicativo'] = new Aplicativo();
        return $this->view('admin.aplicativos.novo');
    }

    /**
    * Tenta cadastrar 
    */
    public function cadastrar(Request $request) {
        $this->validate($request, [
            'titulo'        => 'required|max:255',
            'descricao'     => 'required',
            'imagem'        => 'required|image'
        ]);

        $aplicativo = Aplicativo::create($request->only('titulo', 'descricao', 'online', 'ios', 'android'));
        $this->saveImagem($request, $aplicativo);
        $aplicativo->save();

        return redirect()->route('admin.aplicativos.listar')->with('sucesso', 'Aplicativo "' . $aplicativo->titulo . '" criado com sucesso');
    }

    /**
    * Lista os cadastrados
    */
    public function listar(Request $request) {
        $this->JS_alert = true;
        $this->data['aplicativos'] = Aplicativo::paginate(10);
        
        if ($request->session()->has('sucesso'))
            $this->data['sucesso_mensagem'] = $request->session()->get('sucesso');
        if ($request->session()->has('erro'))
            $this->data['erro_mensagem'] = $request->session()->get('erro');

        return $this->view('admin.aplicativos.listar');
    }

    /**
    * Inicia edição 
    */
    public function editar($id) {
        $this->data['aplicativo'] = Aplicativo::find($id);
        return $this->view('admin.aplicativos.editar');
    }

    /**
    * Tenta editar
    */
    public function atualizar(Request $request, $id) {
        $this->validate($request, [
            'titulo'       => 'required|max:255',
            'descricao'     => 'required',
            'imagem'        => 'image'
        ]);

        $aplicativo = Aplicativo::find($id);
        if (!empty($aplicativo)) {
            $aplicativo->fill($request->only('descricao', 'titulo', 'online', 'android', 'ios'));

            if ($request->hasFile('imagem')) $this->saveImagem($request, $aplicativo);
            
            $aplicativo->save();
            return redirect()->route('admin.aplicativos.listar')->with('sucesso', 'Aplicativo "' . $aplicativo->titulo . '" atualizado com sucesso');
        }
        return redirect()->route('admin.aplicativos.listar')->with('erro', 'Não foi possível encontrar o aplicativo');
    }

    /**
    * Exclui 
    */
    public function excluir($id) {
        $aplicativo = Aplicativo::find($id);
        if (!empty($aplicativo)) {
            $aplicativo->delete();
            return redirect()->route('admin.aplicativos.listar')->with('sucesso', 'Aplicativo "' . $aplicativo->titulo . '" excluído com sucesso');
        }
        return redirect()->route('admin.portfolios.listar')->with('erro', 'Não foi possível encontrar o aplicativo');
    }

    /**
    * Salva a imagem do Serviço
    * @access private
    * @param $request Request (Request com o arquivo a ser enviado)
    * @param $aplicativo Serviço (Objeto que receberá a imagem)
    */
    private function saveImagem(Request $request, Aplicativo $aplicativo) {
        $ext = $request->imagem->extension(); 
        $aplicativo->imagem = basename($request->imagem->storeAs('aplicativos', 'aplicativo_' . $aplicativo->id . '.' . $ext, 'public'));
    }
}
