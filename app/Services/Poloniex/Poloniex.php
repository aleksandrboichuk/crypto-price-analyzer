<?php

namespace App\Services\Poloniex;

use App\Interfaces\CryptoExchangeInterface;
use App\Services\CryptoExchange;

class Poloniex extends CryptoExchange implements CryptoExchangeInterface
{
    protected string $exchangeName = 'Poloniex';

    protected string $pairSeparator = '_';

    public function getConfigAccessor(): string
    {
        return 'poloniex';
    }
}
