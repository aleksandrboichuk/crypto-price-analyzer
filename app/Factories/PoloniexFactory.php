<?php

namespace App\Factories;

use App\Interfaces\CryptoExchangeFactoryInterface;
use App\Interfaces\SpotTradingInterface;
use App\Services\Poloniex\SpotTrading;

class PoloniexFactory implements CryptoExchangeFactoryInterface
{
    public function spotTrading(): SpotTradingInterface
    {
        return new SpotTrading();
    }
}
