<?php

namespace App\Data\TickerPrices;

use JetBrains\PhpStorm\ArrayShape;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class PoloniexTickerPricesData extends Data
{
    public function __construct(
        #[ArrayShape([
            [
                'symbol' => 'string',
                'price' => 'string',
                'time' => 'int',
                'dailyChange' => 'string',
                'ts' => 'int',
            ]
        ])]
        #[DataCollectionOf(PoloniexTickerPriceData::class)]
        public readonly array $prices = [],
    ){}

    public static function from(...$payloads): static
    {
        return new self(...$payloads);
    }
}
