<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;

use App\Models\Servico;
use App\Models\ServicosFotos;

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
            'titulo'        => 'required|max:255',
            'resumo'        => 'required',
            'imagem'        => 'required|image'
        ]);

        $servico = Servico::create($request->except(['_token', 'imagem']));
        $this->saveImagem($request, $servico);
        $servico->save();

        return redirect()->route('admin.servicos.fotos', ['id' => $servico->id])->with('sucesso', 'Serviço de "' . $servico->titulo . '" criado com sucesso');

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
            'titulo'        => 'required|max:255',
            'resumo'        => 'required',
            'imagem'        => 'image'
        ]);

        $servico = Servico::find($id);
        if (!empty($servico)) {
            $servico->fill($request->except(['_token', 'imagem']));

            if ($request->hasFile('imagem')) $this->saveImagem($request, $servico);
            
            $servico->save();
            return redirect()->route('admin.servicos.listar')->with('sucesso', 'Serviço de "' . $servico->titulo . '" atualizado com sucesso');
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
            return redirect()->route('admin.servicos.listar')->with('sucesso', 'Serviço de "' . $servico->titulo . '" excluído com sucesso');
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


    /**
    * Lista Fotos cadastradas
    */
    public function fotos(Request $request, $servicoID) {
        $this->JS_alert = true;
        $this->data['fileupload'] = true;
        $this->data['servico'] = Servico::findOrFail($servicoID);
        $this->data['fotos'] = ServicosFotos::where('servico_id', $servicoID)->paginate(10);
        
        return $this->view('admin.servicos.fotos');
    }

    /**
    * Tenta cadastrar 
    */
    public function fotosCadastrar(Request $request, int $servicoID) {
        $this->validate($request, [
            'arquivo'        => 'required|image'
        ]);

        $foto = ServicosFotos::create(['servico_id' => $servicoID]);
        $ext = $request->arquivo->extension(); 
        $foto->arquivo = basename($request->arquivo->storeAs('servicos_fotos', "foto_{$servicoID}_{$foto->id}.{$ext}", 'public'));
        $foto->save();

        return redirect()->route('admin.servicos.fotos', ['id' => $servicoID])->with('sucesso', 'Foto cadastrada com sucesso');
    }



    /** Exclui */
    public function FotosExcluir($id, $fotoID) {
        $foto = ServicosFotos::find($fotoID);
        if (!empty($foto)) {
            $foto->delete();
            return redirect()->route('admin.servicos.fotos', ['id' => $id])->with('sucesso', 'Foto excluída com sucesso');
        }
        return redirect()->route('admin.servicos.fotos', ['id' => $id])->with('erro', 'Não foi possível encontrar o serviço');
    }
}
