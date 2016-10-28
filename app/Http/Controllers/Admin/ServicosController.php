<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

use App\Models\Servico;

class ServicosController extends AdminController {
    
     /**
    * Inicia cadastro 
    */
    public function novo() {
        $this->data['servico'] = new Servico();
        return $this->view('admin.servicos.novo');
    }

    /**
    * Tenta cadastrar 
    */
    public function cadastrar(Request $request) {
        $this->validate($request, [
            'cliente'       => 'required|max:255',
            'descricao'     => 'required',
            'imagem'        => 'required|image',
            'link'          => 'url'
        ]);

        $servico = Servico::create($request->only('cliente', 'descricao', 'link'));
        $this->saveImagem($request, $servico);
        $servico->save();

        return redirect()->route('admin.servicos.listar')->with('sucesso', 'Serviço de "' . $servico->cliente . '" criado com sucesso');
    }

    /**
    * Lista os cadastrados
    */
    public function listar(Request $request) {
        $this->JS_alert = true;
        $this->data['servicos'] = Servico::paginate(10);
        
        if ($request->session()->has('sucesso'))
            $this->data['sucesso_mensagem'] = $request->session()->get('sucesso');
        if ($request->session()->has('erro'))
            $this->data['erro_mensagem'] = $request->session()->get('erro');

        return $this->view('admin.servicos.listar');
    }

    /**
    * Inicia edição 
    */
    public function editar($id) {
        $this->data['servico'] = Servico::find($id);
        return $this->view('admin.servicos.editar');
    }

    /**
    * Tenta editar
    */
    public function atualizar(Request $request, $id) {
        $this->validate($request, [
            'cliente'       => 'required|max:255',
            'descricao'     => 'required',
            'imagem'        => 'image',
            'link'          => 'url'
        ]);

        $servico = Servico::find($id);
        if (!empty($servico)) {
            $servico->fill($request->only('descricao', 'cliente', 'link'));

            if ($request->hasFile('imagem')) $this->saveImagem($request, $servico);
            
            $servico->save();
            return redirect()->route('admin.servicos.listar')->with('sucesso', 'Serviço de "' . $servico->cliente . '" atualizado com sucesso');
        }
        return redirect()->route('admin.servicos.listar')->with('erro', 'Não foi possível encontrar o serviço');
    }

    /**
    * Exclui 
    */
    public function excluir($id) {
        $servico = Servico::find($id);
        if (!empty($servico)) {
            $servico->delete();
            return redirect()->route('admin.servicos.listar')->with('sucesso', 'Serviço de "' . $servico->cliente . '" excluído com sucesso');
        }
        return redirect()->route('admin.portfolios.listar')->with('erro', 'Não foi possível encontrar o serviço');
    }

    /**
    * Salva a imagem do Serviço
    * @access private
    * @param $request Request (Request com o arquivo a ser enviado)
    * @param $servico Serviço (Objeto que receberá a imagem)
    */
    private function saveImagem(Request $request, Servico $servico) {
        $ext = $request->imagem->extension(); 
        $servico->imagem = basename($request->imagem->storeAs('servicos', 'servico_' . $servico->id . '.' . $ext, 'public'));
    }
}
