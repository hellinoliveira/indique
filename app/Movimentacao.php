<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    //Quando o plural for irregular a tabela deverá ser sobrescrita
    protected $table = 'movimentacoes';


    /**
     * Uma movimentacao pertence a uma indicacao
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function indicacao()
    {
        return $this->belongsTo('App\Indicacao');
    }
}
