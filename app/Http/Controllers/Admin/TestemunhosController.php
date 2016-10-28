<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\TestemunhoRequest;
use App\Http\Controllers\Admin\AdminController;

use App\Models\Testemunho;

class TestemunhosController extends AdminController {
    
    /**
    * Inicia cadastro 
    */
    public function novo() {
        $this->data['testemunho'] = new Testemunho();
        return $this->view('admin.testemunhos.novo');
    }

    /**
    * Tenta cadastrar 
    */
    public function cadastrar(TestemunhoRequest $request) {

        $testemunho = Testemunho::create($request->only('nome', 'comentario', 'cargo'));
        
        if ($request->hasFile('avatar')) $this->saveImagem($request, $testemunho);

        $testemunho->save();

        return redirect()->route('admin.testemunhos.listar')->with('sucesso', 'Testemunho de "' . $testemunho->nome . '" criado com sucesso');
    }

    /**
    * Lista os cadastrados
    */
    public function listar(Request $request) {
        $this->JS_alert = true;
        $this->data['testemunhos'] = Testemunho::paginate(10);
        
        if ($request->session()->has('sucesso'))
            $this->data['sucesso_mensagem'] = $request->session()->get('sucesso');
        if ($request->session()->has('erro'))
            $this->data['erro_mensagem'] = $request->session()->get('erro');

        return $this->view('admin.testemunhos.listar');
    }

    /**
    * Inicia edição 
    */
    public function editar($id) {
        $this->data['testemunho'] = Testemunho::find($id);
        return $this->view('admin.testemunhos.editar');
    }

    /**
    * Tenta editar
    */
    public function atualizar(TestemunhoRequest $request, $id) {

        $testemunho = Testemunho::find($id);
        if (!empty($testemunho)) {
            $testemunho->fill($request->only('comentario', 'nome', 'cargo'));

            if ($request->hasFile('avatar')) $this->saveImagem($request, $testemunho);
            
            $testemunho->save();
            return redirect()->route('admin.testemunhos.listar')->with('sucesso', 'Testemunho de "' . $testemunho->nome . '" atualizado com sucesso');
        }
        return redirect()->route('admin.testemunhos.listar')->with('erro', 'Não foi possível encontrar o testemunho');
    }

    /**
    * Exclui 
    */
    public function excluir($id) {
        $testemunho = Testemunho::find($id);
        if (!empty($testemunho)) {
            $testemunho->delete();
            return redirect()->route('admin.testemunhos.listar')->with('sucesso', 'Testemunho de "' . $testemunho->nome . '" excluído com sucesso');
        }
        return redirect()->route('admin.portfolios.listar')->with('erro', 'Não foi possível encontrar o testemunho');
    }

    /**
    * Salva a avatar do Testemunho
    * @access private
    * @param $request Request (Request com o arquivo a ser enviado)
    * @param $testemunho Testemunho (Objeto que receberá a avatar)
    */
    private function saveImagem(TestemunhoRequest $request, Testemunho $testemunho) {
        $ext = $request->avatar->extension(); 
        $testemunho->avatar = basename($request->avatar->storeAs('testemunhos', 'testemunho_' . $testemunho->id . '.' . $ext, 'public'));
    }
}
