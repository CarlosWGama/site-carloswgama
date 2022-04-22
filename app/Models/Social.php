<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
* Classe que trata os dados as Redes Socais
*/
class Social extends Model {
    
    use SoftDeletes;

    /**
    * Nome da Tabela
    * @var string
    */
    protected $table = 'redes_sociais';

    /**
    * Campos que podem ser preenchidos no create/update
    * @access protected
    * @var array
    */
    protected $fillable = ['class_icon', 'lado', 'link'];

    /**
    * Controlador de datas usadas no código
    */
    protected $dates = ['deleted_at'];

    /**
    * Converte as varaveis para os tipos nativos
    * @var array
    */
    protected $casts = [
        'lado' => 'boolean'
    ];
}
