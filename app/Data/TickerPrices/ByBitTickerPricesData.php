<?php

namespace App\Data\TickerPrices;

use JetBrains\PhpStorm\ArrayShape;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class ByBitTickerPricesData extends Data
{
    public function __construct(
        public readonly ?string $category,
        #[ArrayShape([
            [
                'symbol' => 'string',
                'price' => 'string',
                'time' => 'int',
                'dailyChange' => 'string',
                'ts' => 'int',
            ]
        ])]
        #[MapInputName('list')]
        #[DataCollectionOf(ByBitTickerPriceData::class)]
        public readonly ?array $prices = [],
    ){}
}
