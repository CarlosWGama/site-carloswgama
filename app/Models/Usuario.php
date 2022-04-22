<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
* Model de Usuarios
* @package Models
* @author Carlos W. Gama
*/
class Usuario extends Authenticatable {


    use SoftDeletes;

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
    * Controlador de datas usadas no código
    */
    protected $dates = ['deleted_at'];

    /**
    * Informa ao Auth que o password é o campo senha
    */
    public function getAuthPassword() {
       return $this->senha;
    }

    /**
    * Criptografa a senha
    */
    public function setSenhaAttribute($senha) {   
        $this->attributes['senha'] = bcrypt($senha);
    }
}
