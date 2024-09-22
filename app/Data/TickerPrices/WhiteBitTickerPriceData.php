<?php

namespace App\Data\TickerPrices;

use JetBrains\PhpStorm\ArrayShape;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;

class WhiteBitTickerPriceData extends Data
{
    public function __construct(
        #[MapInputName('last_price')]
        public readonly ?string $price,
        #[MapInputName('base_id')]
        public readonly ?int $baseId,
        #[MapInputName('quote_id')]
        public readonly ?int $quoteId,
        #[MapInputName('quote_volume')]
        public readonly ?string $quoteVolume,
        #[MapInputName('base_volume')]
        public readonly ?string $baseVolume,
        public readonly ?bool $isFrozen,
        public readonly ?string $change,
    ){}
}
