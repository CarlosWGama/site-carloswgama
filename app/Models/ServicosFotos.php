<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicosFotos extends Model
{
    protected $table = 'servicos_fotos';
    
    use SoftDeletes;

    /**
    * Campos que podem ser preenchidos no create/update
    * @access protected
    * @var array
    */
    protected $guarded = [];

    /**
    * Controlador de datas usadas no código
    */
    protected $dates = ['deleted_at'];
}