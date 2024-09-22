<?php

namespace App\Services\JuCoin;

use App\Data\TickerPrices\BinanceTickerPriceData;
use App\Data\TickerPrices\JuCoinTickerPriceData;
use App\Data\TickerPrices\JuCoinTickerPricesData;
use App\Interfaces\SpotTradingInterface;
use phpDocumentor\Reflection\Exception;
use Spatie\LaravelData\Data;

class SpotTrading extends JuCoin implements SpotTradingInterface
{
    public function getTickerPrices(): Data
    {
        $path = $this->paths['spot']['ticker_prices_path'] ?? throw new Exception("Ticker price path is undefined");

        return $this->client->get(
            path: $path,
            dto: JuCoinTickerPricesData::class
        );
    }

    public function getTickerPrice(string $firstCurrency, string $secondCurrency): Data
    {
        return $this->client->get(
            path: $this->paths['spot']['ticker_prices_path'],
            data: [
                'symbol' => $this->makeCurrencyPair($firstCurrency, $secondCurrency)
            ],
            dto: JuCoinTickerPriceData::class
        );
    }
}
