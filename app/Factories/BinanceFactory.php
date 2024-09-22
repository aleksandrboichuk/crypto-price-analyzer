<?php

namespace App\Factories;

use App\Interfaces\CryptoExchangeFactoryInterface;
use App\Interfaces\SpotTradingInterface;
use App\Services\Binance\SpotTrading;

class BinanceFactory implements CryptoExchangeFactoryInterface
{
    public function spotTrading(): SpotTradingInterface
    {
        return new SpotTrading();
    }
}
