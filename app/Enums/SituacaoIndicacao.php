<?php

namespace App\Enums;

use Artisaninweb\Enum\Enum;

/**
 * @method static SituacaoIndicacao ENUM()
 */
class SituacaoIndicacao extends Enum {

    const ANALISE    = 'Em análise';
    const COMERCIAL    = 'Encaminhada ao comercial';
    const VENDIDO    = 'Venda realizada';
    const DEPOSITADO    = 'Pagamento depositado';
    const OBJECAO    = 'Objeção';

}
