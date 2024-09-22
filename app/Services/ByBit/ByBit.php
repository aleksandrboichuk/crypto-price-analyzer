<?php

namespace App\Services\ByBit;

use App\Interfaces\CryptoExchangeInterface;
use App\Services\CryptoExchange;

class ByBit extends CryptoExchange implements CryptoExchangeInterface
{
    protected string $exchangeName = 'ByBit';

    public function getConfigAccessor(): string
    {
        return 'bybit';
    }
}
