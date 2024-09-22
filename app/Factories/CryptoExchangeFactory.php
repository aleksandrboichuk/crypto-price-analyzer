<?php

namespace App\Factories;

use app\Enums\CryptoExchangeEnum;
use App\Interfaces\CryptoExchangeFactoryInterface;
use Mockery\Exception;

class CryptoExchangeFactory
{
    public function getFactory(CryptoExchangeEnum $exchange): CryptoExchangeFactoryInterface
    {
        return match ($exchange->name){
            "Binance" => new BinanceFactory,
            "JuCoin" => new JuCoinFactory,
            "Poloniex" => new PoloniexFactory,
            "ByBit" => new ByBitFactory,
            "WhiteBit" => new WhiteBitFactory,
            default => throw new Exception("Undefined Exchange")
        };
    }
}
