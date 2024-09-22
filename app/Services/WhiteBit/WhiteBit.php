<?php

namespace App\Services\WhiteBit;

use App\Interfaces\CryptoExchangeInterface;
use App\Services\CryptoExchange;

class WhiteBit extends CryptoExchange implements CryptoExchangeInterface
{
    protected string $exchangeName = 'WhiteBit';

    protected string $pairSeparator = '_';

    public function getConfigAccessor(): string
    {
        return 'whitebit';
    }
}
