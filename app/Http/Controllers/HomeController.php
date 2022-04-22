<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Social;
use App\Models\Slide;
use App\Models\Biografia;
use App\Models\Portfolio;
use App\Models\Servico;
use App\Models\ServicosFotos;
use App\Models\Aplicativo;
use App\Models\Testemunho;

use App\Mail\ContatoMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller {

	public function index() {
		$dados = [
			'redes_sociais' => Social::all(),
			'slides'		=> Slide::all(),
			'biografia'		=> Biografia::first(),
			'portfolios'	=> Portfolio::all(),
			'servicos'		=> Servico::all(),
			'aplicativos'	=> Aplicativo::all(),
			'testemunhos'	=> Testemunho::all()
		];
    	return view('site.home', $dados);
	}
	
    public function servico($id) {
    	$dados = [
			'servico' 		=> Servico::with('fotos')->findOrFail($id),
			'redes_sociais' => Social::all(),
		];
    	return view('site.servico', $dados);
	}
	
	public function aplicativo($id) {
		return view('site.aplicativo', [
			'aplicativo' 		=> Aplicativo::findOrFail($id),
			'redes_sociais' => Social::all(),
		]);
	}

    public function email(Request $request) {
    	Mail::to('carloswgama@gmail.com')->queue(new ContatoMail(
    		$request->nome, 
    		$request->assunto, 
    		$request->email, 
    		$request->mensagem
    	));

    	return response()->json(['success' => true]);
    }
}
