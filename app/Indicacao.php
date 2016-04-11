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
        'motivo_objecao',
        'descricao',
        'situacao',
        'nome_empresa',
        'ramo_empresa',
        'nome_contato',
        'cargo_contato',
        'cpnj',
        'cidade',
        'UF',
        'endereco',
        'bairro',
        'quantidade_alunos',
        'quantidade_unindades',
        'telefone',
        'telefone_conta',
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
     * Uma indicacao pode possuir varias movimentacoes
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movimentacao()
    {
        return $this->hasMany('App\Movimentacao');
    }
}
