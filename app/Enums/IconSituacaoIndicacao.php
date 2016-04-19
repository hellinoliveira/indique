<?php

namespace App\Enums;

use Artisaninweb\Enum\Enum;

/**
 * @method static IconSituacaoIndicacao ENUM()
 */
class IconSituacaoIndicacao extends Enum {

    const ANALISE    = 'fa-clock-o';
    const COMERCIAL    = 'fa-suitcase';
    const VENDIDO    = 'fa-dollar';
    const DEPOSITADO    = 'fa-money';
    const OBJECAO    = 'fa-ban';


}
