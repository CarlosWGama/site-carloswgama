<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
* Model de Usuarios
* @package Models
* @author Carlos W. Gama
*/
class Usuario extends Authenticatable {
    /**
    * Tabela usada
    * @access protected
    * @var string
    */
    protected $table = 'usuarios';


    /**
    * Variaveis que podem ser passadas diretamente no create ou update.
    *
    * @var array
    */
    protected $fillable = [
        'nome', 'email', 'senha',
    ];

    /**
    * Variaveis que não são retornadas por padrão
    *
    * @var array
    */
    protected $hidden = [
        'senha', 'remember_token',
    ];

    /**
    * Informa ao Auth que o password é o campo senha
    */
    public function getAuthPassword() {
       return $this->senha;
    }
}
