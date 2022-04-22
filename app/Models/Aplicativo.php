<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aplicativo extends Model {
    
    use SoftDeletes;

    /**
    * Campos que podem ser preenchidos no create/update
    * @access protected
    * @var array
    */
    protected $fillable = ['descricao', 'titulo', 'online', 'ios', 'android'];

    /**
    * Controlador de datas usadas no código
    */
    protected $dates = ['deleted_at'];
}
