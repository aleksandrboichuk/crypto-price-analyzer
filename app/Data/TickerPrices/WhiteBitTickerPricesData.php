<?php

namespace App\Data\TickerPrices;

use JetBrains\PhpStorm\ArrayShape;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class WhiteBitTickerPricesData extends Data
{
    public function __construct(
        #[ArrayShape([
            [
                'baseId' => 'int',
                'quoteId' => 'int',
                'lastPrice' => 'string',
                'quoteVolume' => 'string',
                'baseVolume' => 'string',
                'isFrozen' => 'bool',
                'change' => 'string',
            ]
        ])]
        #[DataCollectionOf(WhiteBitTickerPriceData::class)]
        public readonly array $prices = [],
    ){}

    public static function from(...$payloads): static
    {
        return new self(...$payloads);
    }
}
