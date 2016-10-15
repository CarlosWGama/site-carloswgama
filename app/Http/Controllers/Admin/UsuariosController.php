<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Usuario;
/**
* Classe responsável por geenciar os usuários com acesso ao admin
*/
class UsuariosController extends AdminController {
    

    /**
    * Exibe view de novo usuário
    */
    public function novo() {
        $this->data['usuario'] = new Usuario();
        return $this->view('admin.usuarios.novo');
    }

    /**
    * Tenta cadastrar
    */ 
    public function cadastrar(Request $request) {
        $this->validate($request, [
            'nome'          => 'required|max:255',
            'email'         => 'required|email|unique:usuarios,email',
            'senha'         => 'required|same:senha_confirm|min:6',
            'senha_confirm' => 'required'
        ]);

        $usuario = Usuario::create($request->only('nome', 'senha', 'email'));        

        return redirect()->route('admin.usuarios.listar')->with('sucesso', 'Usuário "' . $usuario->nome . '" cadastrado com sucesso');
    } 

    /**
    * Exibe view da edição do usuário
    */
    public function editar($id) {
        $this->data['usuario'] = Usuario::find($id);
        return $this->view('admin.usuarios.editar');
    } 

    /**
    * Tenta atualizar
    */ 
    public function atualizar(Request $request, $id) {
        $usuario = Usuario::find($id);
        
        if (!empty($usuario)) {
        
            $validation = [
                'nome'          => 'required|max:255',
                'email'         => 'required|email|unique:usuarios,email,' . $id,
            ];
            
            $update = $request->except('senha', 'senha_confirm');
            if (!empty($request->input('senha'))) {
                $validation['senha'] = 'required|same:senha_confirm|min:6';
                $validation['senha_confirm'] = 'required';
                $update = $request->except('senha_confirm');
            } 
        
            $this->validate($request, $validation);

            $usuario->update($update);

            return redirect()->route('admin.usuarios.listar')->with('sucesso', 'Usuário "' . $usuario->nome . '" editado com sucesso');
        }
        return redirect()->route('admin.usuarios.listar')->with('erro', 'Usuário não encontrado');
    }

    /**
    * Tenta excluir
    */
    public function excluir($id) {
        $usuario = Usuario::find($id);
        if (!empty($usuario)) {
            $usuario->delete();
            return redirect()->route('admin.usuarios.listar')->with('sucesso', 'Usuário "' . $usuario->nome . '" deletado com sucesso');
        }
        return redirect()->route('admin.usuarios.listar')->with('erro', 'Usuário não encontrado');
    }

    /**
    * Lista todos os usuários
    */
    public function listar(Request $request) {
        $this->data['usuarios'] = Usuario::paginate(10);
        $this->JS_alert = true;

        if ($request->session()->has('erro')) 
            $this->data['erro_mensagem'] = $request->session()->get('erro');
        if ($request->session()->has('sucesso')) 
            $this->data['sucesso_mensagem'] = $request->session()->get('sucesso');
        
        return $this->view('admin.usuarios.listar');
    }
}
