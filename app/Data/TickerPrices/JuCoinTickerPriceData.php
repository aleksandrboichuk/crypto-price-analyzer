<?php

namespace App\Data\TickerPrices;

use JetBrains\PhpStorm\ArrayShape;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;

class JuCoinTickerPriceData extends Data
{
    public function __construct(
        public readonly ?string $symbol,
        public readonly ?string $price,
    ){}
}
