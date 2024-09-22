<?php

namespace App\Services;

use App\Enums\CryptoExchangeEnum;
use App\Factories\CryptoExchangeFactory;

class CryptoExchangeComparison
{
    /**
     * Comparing currency pair prices among exchanges
     *
     * @param string $firstCurrency
     * @param string $secondCurrency
     * @param CryptoExchangeEnum[]  $exchanges
     *
     * @return array
     */
    public function compareCurrencyPairPrices(string $firstCurrency, string $secondCurrency, array $exchanges = []): array
    {
        $result = [];

        $exchanges = empty($exchanges) ? CryptoExchangeEnum::cases() : $exchanges;

        foreach ($exchanges as $exchange) {
            $factory = (new CryptoExchangeFactory)->getFactory($exchange);

            $spotTradingService = $factory->spotTrading();

            $tickerData = $spotTradingService->getTickerPrice($firstCurrency, $secondCurrency);

            $result[$spotTradingService->getExchangeName()] = $tickerData->price ? (float)$tickerData->price : null;
        }

        asort($result);

        return $result;
    }
}
