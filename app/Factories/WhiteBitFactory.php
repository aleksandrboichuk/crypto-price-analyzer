<?php

namespace App\Factories;

use App\Interfaces\CryptoExchangeFactoryInterface;
use App\Interfaces\SpotTradingInterface;
use App\Services\WhiteBit\SpotTrading;

class WhiteBitFactory implements CryptoExchangeFactoryInterface
{
    public function spotTrading(): SpotTradingInterface
    {
        return new SpotTrading();
    }
}
