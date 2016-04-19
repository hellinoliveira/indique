<?php

namespace App;

use App\Enums\IconSituacaoIndicacao;
use App\Enums\SituacaoIndicacao;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    //Quando o plural for irregular a tabela deverá ser sobrescrita
    protected $table = 'movimentacoes';

    protected $fillable = ['
        situacao_anterior', 'situacao_atual',
        'observacao_movimentacao', 'lido'];


//    todo extrair esses 2 metodos pra evitar duplicidade de codigo. colocar no Model ou nos Enums

    public function getSituacaoAtualAttribute($value)
    {
        $situacao = SituacaoIndicacao::byName($value);
        return $situacao->getConstValue();
    }

    public function getNomeSituacaoAttribute()
    {
        foreach (SituacaoIndicacao::getEnumValues() as $enum) {
            if ($enum->getConstValue() == $this->situacao_atual) {
                return $enum->getConstName();
            }
        }
    }

    public function getIconSituacaoAttribute()
    {
        foreach (SituacaoIndicacao::getEnumValues() as $enum) {
            if ($enum->getConstValue() == $this->situacao_atual) {
                $icone = IconSituacaoIndicacao::byName($enum->getConstName());
                return $icone->getConstValue();
            }
        }
    }

    /**
     * Uma movimentacao pertence a uma indicacao
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function indicacao()
    {
        return $this->belongsTo('App\Indicacao');
    }
}
