<?php

namespace App\Interfaces;


interface CryptoExchangeFactoryInterface
{
    public function spotTrading(): SpotTradingInterface;
}
