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
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Uma indicacao possui uma empresa
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa()
    {
        return $this->hasOne('App\Empresa');
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
