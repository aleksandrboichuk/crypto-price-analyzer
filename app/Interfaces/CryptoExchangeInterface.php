<?php

namespace App\Interfaces;

use App\Services\ExternalApiClient;

interface CryptoExchangeInterface
{
    public function getConfigAccessor(): string;
}
