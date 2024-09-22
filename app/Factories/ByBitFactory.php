<?php

namespace App\Factories;

use App\Interfaces\CryptoExchangeFactoryInterface;
use App\Interfaces\SpotTradingInterface;
use App\Services\ByBit\SpotTrading;

class ByBitFactory implements CryptoExchangeFactoryInterface
{
    public function spotTrading(): SpotTradingInterface
    {
        return new SpotTrading();
    }
}
