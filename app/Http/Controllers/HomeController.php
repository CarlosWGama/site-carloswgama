<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Social;
use App\Models\Slide;

class HomeController extends Controller {

	public function index() {
		$dados = [
			'redes_sociais' => Social::all(),
			'slides'		=> Slide::all()
		];
    	return view('site.home', $dados);
    }
}
