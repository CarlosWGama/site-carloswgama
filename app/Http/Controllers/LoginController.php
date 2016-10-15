<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

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
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->senha])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('login')->with('erro_login', 'Usuário ou senha incorreta');
    }

    /**
    * Faz o logout
    */
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
