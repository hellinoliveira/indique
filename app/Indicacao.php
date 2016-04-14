<?php

namespace App;

use App\Enums\CorSituacaoIndicacao;
use App\Enums\SituacaoIndicacao;
use Illuminate\Database\Eloquent\Model;

class Indicacao extends Model
{
    //Quando o plural for irregular a tabela deverá ser sobrescrita
    protected $table = 'indicacoes';

//    protected $cor_situacao = CorSituacaoIndicacao::ANALISE;

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
     * Retorna a situação de acordo com o ENUM
     * @param $value
     * @return \GerritDrost\Lib\Enum\Enum
     */
    public function getSituacaoAttribute($value)
    {
        $situacao = SituacaoIndicacao::byName($value);
        return $situacao->getConstValue();
    }

//    public function setCorSituacaoAttribute($value)
//    {
//        $this->cor_situacao = $value;
//    }

    public function getCorSituacaoAttribute()
    {
        foreach (SituacaoIndicacao::getEnumValues() as $enum) {
            if ($enum->getConstValue() == $this->situacao) {
                return $enum->getConstName();
            }
        }
    }

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
