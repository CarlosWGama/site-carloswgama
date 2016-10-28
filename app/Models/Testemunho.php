<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
* Classe para exibir comentários feitos sobre seu serviço
*/
class Testemunho extends Model {
    
    use SoftDeletes;


    /**
    * Campos que podem ser preenchidos no create/update
    * @access protected
    * @var array
    */
    protected $fillable = ['comentario', 'nome', 'cargo'];

    /**
    * Controlador de datas usadas no código
    */
    protected $dates = ['deleted_at'];
}
