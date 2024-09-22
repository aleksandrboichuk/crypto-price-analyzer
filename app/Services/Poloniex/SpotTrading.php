<?php

namespace App\Services\Poloniex;

use App\Data\TickerPrices\JuCoinTickerPriceData;
use App\Data\TickerPrices\PoloniexTickerPriceData;
use App\Data\TickerPrices\PoloniexTickerPricesData;
use App\Interfaces\SpotTradingInterface;
use phpDocumentor\Reflection\Exception;
use Spatie\LaravelData\Data;

class SpotTrading extends Poloniex implements SpotTradingInterface
{
    public function getTickerPrices(): Data
    {
        $path = $this->paths['spot']['ticker_prices_path'] ?? throw new Exception("Ticker price path is undefined");

        return $this->client->get(
            path: $path,
            dto: PoloniexTickerPricesData::class
        );
    }

    public function getTickerPrice(string $firstCurrency, string $secondCurrency): Data
    {
        return $this->client->get(
            path: $this->paths['spot']['ticker_price_path'],
            dto: PoloniexTickerPriceData::class,
            pathVariables: [
                'symbol' => $this->makeCurrencyPair($firstCurrency, $secondCurrency)
            ]
        );
    }
}
