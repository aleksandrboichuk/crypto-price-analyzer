<?php

namespace App\Services\ByBit;

use App\Data\TickerPrices\ByBitTickerPriceData;
use App\Data\TickerPrices\ByBitTickerPricesData;
use App\Interfaces\SpotTradingInterface;
use phpDocumentor\Reflection\Exception;
use Spatie\LaravelData\Data;

class SpotTrading extends ByBit implements SpotTradingInterface
{
    public function getTickerPrices(): Data
    {
        $path = $this->paths['spot']['ticker_prices_path'] ?? throw new Exception("Ticker price path is undefined");

        return $this->client->get(
            path: $path,
            data: [
                'category' => 'spot'
            ],
            responseKey: 'result',
            dto: ByBitTickerPricesData::class
        );
    }

    public function getTickerPrice(string $firstCurrency, string $secondCurrency): Data
    {
        $tickerPrices = $this->client->get(
            path: $this->paths['spot']['ticker_prices_path'],
            data: [
                'symbol' => $this->makeCurrencyPair($firstCurrency, $secondCurrency),
                'category' => 'spot'
            ],
            responseKey: 'result',
            dto: ByBitTickerPricesData::class
        );

        $tickerPrice = current($tickerPrices->prices);

        return $tickerPrice instanceof ByBitTickerPricesData
            ? $tickerPrice
            : ByBitTickerPriceData::from([]);
    }
}
