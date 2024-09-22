<?php

namespace App\Data\TickerPrices;

use JetBrains\PhpStorm\ArrayShape;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class BinanceTickerPricesData extends Data
{
    public function __construct(
        #[ArrayShape([
            [
                'symbol' => 'string',
                'price' => 'string'
            ]
        ])]
        #[DataCollectionOf(BinanceTickerPriceData::class)]
        public readonly array $prices = [],
    ){}

    public static function from(...$payloads): static
    {
        return new self(...$payloads);
    }
}
