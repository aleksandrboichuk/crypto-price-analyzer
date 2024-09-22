<?php

namespace App\Services\Binance;

use App\Interfaces\CryptoExchangeInterface;
use App\Services\CryptoExchange;

class Binance extends CryptoExchange implements CryptoExchangeInterface
{
    protected string $exchangeName = 'Binance';

    public function getConfigAccessor(): string
    {
        return 'binance';
    }
}
