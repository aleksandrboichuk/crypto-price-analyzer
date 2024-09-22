<?php

namespace App\Services\JuCoin;

use App\Interfaces\CryptoExchangeInterface;
use App\Services\CryptoExchange;

class JuCoin extends CryptoExchange implements CryptoExchangeInterface
{
    protected string $exchangeName = 'JuCoin';

    public function getConfigAccessor(): string
    {
        return 'jucoin';
    }
}
