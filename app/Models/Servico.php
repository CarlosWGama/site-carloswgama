<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servico extends Model {
    
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

    public function fotos() {
        return $this->hasMany('App\Models\ServicosFotos', 'servico_id');
    }
}
