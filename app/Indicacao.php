<?php

namespace App;

use App\Enums\IconSituacaoIndicacao;
use App\Enums\SituacaoIndicacao;
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
     * Retorna a situação de acordo com o ENUM
     * @param $value
     * @return \GerritDrost\Lib\Enum\Enum
     */
    public function getSituacaoAttribute($value)
    {
        $situacao = SituacaoIndicacao::byName($value);
        return $situacao->getConstValue();
    }


    public function getNomeSituacaoAttribute()
    {
        foreach (SituacaoIndicacao::getEnumValues() as $enum) {
            if ($enum->getConstValue() == $this->situacao) {
                return $enum->getConstName();
            }
        }
    }

    public function getIconSituacaoAttribute()
    {
        foreach (SituacaoIndicacao::getEnumValues() as $enum) {
            if ($enum->getConstValue() == $this->situacao) {
                $icone = IconSituacaoIndicacao::byName($enum->getConstName());
                return $icone->getConstValue();
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
    public function movimentacoes()
    {
        return $this->hasMany('App\Movimentacao');
    }
}
