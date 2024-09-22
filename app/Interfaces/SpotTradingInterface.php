<?php

namespace App\Interfaces;

use Spatie\LaravelData\Data;

interface SpotTradingInterface
{
    public function getTickerPrices(): Data;

    public function getTickerPrice(string $firstCurrency, string $secondCurrency): Data;
}
