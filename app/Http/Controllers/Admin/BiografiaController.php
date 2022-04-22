<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Biografia;
/**
* Conteúdos básicoas da Biográfia 
* @package Controller
* @subpackage Admin
*/
class BiografiaController extends AdminController {
    
    /**
    * Inicia edição de Perfil
    */
    public function editar(Request $request) {
        $this->data['biografia'] = Biografia::first();

        if ($request->session()->has('sucesso'))
            $this->data['sucesso_mensagem'] = $request->session()->get('sucesso');

        return $this->view('admin.biografia.editar');
    }

    /**
    * Atualiza a Biografia
    */
    public function atualizar(Request $request) {
        $this->validate($request, [
            'titulo'    => 'required|max:100',
            'descricao' => 'required',
            'avatar'    => 'image|max:1024'
        ]);

        $biografia = Biografia::first();
        $biografia->fill($request->only('descricao', 'titulo'));
        
        if ($request->hasFile('avatar')) {
            $ext = $request->avatar->extension(); 
            $biografia->avatar = $request->avatar->storeAs('avatars', 'carlos.' . $ext, 'public');
        }
        $biografia->save();

        return redirect()->route('admin.biografia.editar')->with('sucesso', 'Biográfia atualizada');
    }
}
