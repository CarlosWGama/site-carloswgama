<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Social;
use App\Models\Slide;
use App\Models\Biografia;

class HomeController extends Controller {

	public function index() {
		$dados = [
			'redes_sociais' => Social::all(),
			'slides'		=> Slide::all(),
			'biografia'		=> Biografia::first()
		];
    	return view('site.home', $dados);
    }
}
