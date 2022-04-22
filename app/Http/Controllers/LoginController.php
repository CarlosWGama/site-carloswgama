<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

/**
* Classe responsável pelo Login
* @author Carlos W. Gama
*/
class LoginController extends Controller {

    /**
    * Tela de Login
    */
    public function index(Request $request) {
        $data = [];
        if ($request->session()->has('erro_login'))
            $data['erro_login'] = $request->session()->get('erro_login');
        return view('login', $data);
    }

    /**
    * Tenta realizar o login
    */
    public function logon(Request $request) {

        $this->validate($request, [
            'email' => 'email|required|max:255',
            'senha' => 'required|min:6',
        ]);
        

        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario != null && Hash::check($request->senha, $usuario->senha)) {
            session(['usuario' => $usuario]);
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('login')->with('erro_login', 'Usuário ou senha incorreta');
    }

    /**
    * Faz o logout
    */
    public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
