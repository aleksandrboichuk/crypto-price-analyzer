<?php

namespace App\Services\WhiteBit;

use App\Data\TickerPrices\ByBitTickerPricesData;
use App\Data\TickerPrices\PoloniexTickerPriceData;
use App\Data\TickerPrices\WhiteBitTickerPriceData;
use App\Data\TickerPrices\WhiteBitTickerPricesData;
use App\Interfaces\SpotTradingInterface;
use phpDocumentor\Reflection\Exception;
use Spatie\LaravelData\Data;

class SpotTrading extends WhiteBit implements SpotTradingInterface
{
    public function getTickerPrices(): Data
    {
        $path = $this->paths['spot']['ticker_prices_path'] ?? throw new Exception("Ticker price path is undefined");

        return $this->client->get(
            path: $path,
            responseKey: 'result',
            dto: WhiteBitTickerPricesData::class
        );
    }

    public function getTickerPrice(string $firstCurrency, string $secondCurrency): Data
    {
        $tickerPrices = $this->getTickerPrices();

        return WhiteBitTickerPriceData::from(
            $tickerPrices->prices[$this->makeCurrencyPair($firstCurrency, $secondCurrency)] ?? []
        );
    }
}
