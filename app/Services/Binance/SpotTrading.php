<?php

namespace App\Services\Binance;

use App\Data\TickerPrices\BinanceTickerPriceData;
use App\Data\TickerPrices\BinanceTickerPricesData;
use App\Interfaces\SpotTradingInterface;
use Spatie\LaravelData\Data;

class SpotTrading extends Binance implements SpotTradingInterface
{
    public function getTickerPrices(): Data
    {
        return $this->client->get(
            path: $this->paths['spot']['ticker_prices_path'],
            dto: BinanceTickerPricesData::class
        );
    }

    public function getTickerPrice(string $firstCurrency, string $secondCurrency): Data
    {
        return $this->client->get(
            path: $this->paths['spot']['ticker_prices_path'],
            data: [
                'symbol' => $this->makeCurrencyPair($firstCurrency, $secondCurrency)
            ],
            dto: BinanceTickerPriceData::class
        );
    }
}
