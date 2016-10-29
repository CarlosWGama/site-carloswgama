<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
* Classe para cuidar dos dados dos Slide
* @package Models
*/
class Slide extends Model {
    
    use SoftDeletes;

    /**
    * Campos que podem ser preenchidos no create/update
    * @access protected
    * @var array
    */
    protected $fillable = ['class_icon', 'descricao'];

    /**
    * Controlador de datas usadas no código
    */
    protected $dates = ['deleted_at'];
}
