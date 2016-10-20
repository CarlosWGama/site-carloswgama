<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
* Controla os dados da Biografia
* @package Models
*/
class Biografia extends Model {
    
    /**
    * Nome da tabela
    */
    protected $table = 'biografia';

    /**
    * Campos que podem ser preenchidos no create/update
    */
    protected $fillable = ['descricao', 'titulo'];

    /**
    * Retorna todos os anos vinculados a biografia
    * @return array[Ano]
    */
    public function anos() {
        return $this->hasMany(\App\Models\Ano::class)->orderBy('ano');
    }
}
