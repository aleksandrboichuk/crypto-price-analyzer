<?php

namespace App\Factories;

use App\Interfaces\CryptoExchangeFactoryInterface;
use App\Interfaces\SpotTradingInterface;
use App\Services\JuCoin\SpotTrading;

class JuCoinFactory implements CryptoExchangeFactoryInterface
{
    public function spotTrading(): SpotTradingInterface
    {
        return new SpotTrading();
    }
}
