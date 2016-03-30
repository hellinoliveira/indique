<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicacao extends Model
{
    //Quando o plural for irregular a tabela deverá ser sobrescrita
    protected $table = 'indicacoes';

    protected $fillable = [
        'descricao',
        'situacao',
        'motivo_objecao'
    ];

    /**
     * Uma indicacao pertence a um cliente
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    /**
     * Uma indicacao pode possuir varias movimentacoes
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movimentacao()
    {
        return $this->hasMany('App\Movimentacao');
    }
}
