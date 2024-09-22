<?php

namespace App\Data\TickerPrices;

use JetBrains\PhpStorm\ArrayShape;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;

class ByBitTickerPriceData extends Data
{
    public function __construct(
        public readonly ?string $symbol,
        #[MapInputName('lastPrice')]
        public readonly ?string $price,
        public readonly ?string $bid1Price,
        public readonly ?string $bid1Size,
        public readonly ?string $ask1Price,
        public readonly ?string $prevPrice24h,
        public readonly ?string $price24hPcnt,
        public readonly ?string $highPrice24h,
        public readonly ?string $lowPrice24h,
        public readonly ?string $turnover24h,
        public readonly ?string $volume24h,
    ){}
}
