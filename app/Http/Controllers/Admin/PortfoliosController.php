<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Portfolio;

class PortfoliosController extends AdminController {
    
     /**
    * Inicia cadastro 
    */
    public function novo() {
        $this->data['portfolio'] = new Portfolio();
        return $this->view('admin.portfolios.novo');
    }

    /**
    * Tenta cadastrar 
    */
    public function cadastrar(Request $request) {
        $this->validate($request, [
            'descricao'     => 'required|max:255',
            'titulo'        => 'required|max:50',
            'imagem'        => 'required|image'
        ]);

        $portfolio = Portfolio::create($request->only('titulo', 'descricao'));
        $this->saveImagem($request, $portfolio);
        $portfolio->save();

        return redirect()->route('admin.portfolios.listar')->with('sucesso', 'Portfólio "' . $portfolio->titulo . '" criado com sucesso');
    }

    /**
    * Lista os cadastrados
    */
    public function listar(Request $request) {
        $this->JS_alert = true;
        $this->data['portfolios'] = Portfolio::paginate(10);
        
        if ($request->session()->has('sucesso'))
            $this->data['sucesso_mensagem'] = $request->session()->get('sucesso');
        if ($request->session()->has('erro'))
            $this->data['erro_mensagem'] = $request->session()->get('erro');

        return $this->view('admin.portfolios.listar');
    }

    /**
    * Inicia edição 
    */
    public function editar($id) {
        $this->data['portfolio'] = Portfolio::find($id);
        return $this->view('admin.portfolios.editar');
    }

    /**
    * Tenta editar
    */
    public function atualizar(Request $request, $id) {
        $this->validate($request, [
            'descricao'     => 'required|max:255',
            'titulo'        => 'required|max:50',
            'imagem'        => 'image'
        ]);

        $portfolio = Portfolio::find($id);
        if (!empty($portfolio)) {
            $portfolio->fill($request->only('descricao', 'titulo'));

            if ($request->hasFile('imagem')) $this->saveImagem($request, $portfolio);
            
            $portfolio->save();
            return redirect()->route('admin.portfolios.listar')->with('sucesso', 'Portfólio "' . $portfolio->titulo . '" atualizado com sucesso');
        }
        return redirect()->route('admin.portfolios.listar')->with('erro', 'Não foi possível encontrar o portfólio');
    }

    /**
    * Exclui 
    */
    public function excluir($id) {
        $portfolio = Portfolio::find($id);
        if (!empty($portfolio)) {
            $portfolio->delete();
            return redirect()->route('admin.portfolios.listar')->with('sucesso', 'Portfólio "' . $portfolio->titulo . '" excluído com sucesso');
        }
        return redirect()->route('admin.portfolios.listar')->with('erro', 'Não foi possível encontrar o portfólio');
    }

    /**
    * Salva a imagem do portfólio
    * @access private
    * @param $request Request (Request com o arquivo a ser enviado)
    * @param $portfolio Portfolio (Objeto que receberá a imagem)
    */
    private function saveImagem(Request $request, Portfolio $portfolio) {
        $ext = $request->imagem->extension(); 
        $portfolio->imagem = basename($request->imagem->storeAs('portfolios', 'portfolio_' . $portfolio->id . '.' . $ext, 'public'));
    }

}
