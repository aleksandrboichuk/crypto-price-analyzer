<?php

namespace App\Services;

use App\Interfaces\CryptoExchangeInterface;
use App\Services\ExternalApiClient;
use phpDocumentor\Reflection\Exception;

abstract class CryptoExchange implements CryptoExchangeInterface
{
    protected ExternalApiClient $client;

    protected array $config = [];

    protected array $paths = [];

    protected string $exchangeName = '';

    protected string $pairSeparator = '';

    public function __construct()
    {
        $this->setConfig(
            config('crypto-exchanges.' . $this->getConfigAccessor()) ?? throw new Exception("Undefined exchange config")
        );

        $this->setPaths(
            $this->config['paths'] ?? throw new Exception("Undefined exchange API paths")
        );

        $this->setClient(
            new ExternalApiClient(
                $this->config['base_api_url'] ?? throw new Exception("Undefined exchange base API URL")
            )
        );
    }

    protected function makeCurrencyPair(string $firstCurrency, string $secondCurrency): string
    {
        return strtoupper($firstCurrency) . $this->pairSeparator . strtoupper($secondCurrency);
    }

    abstract public function getConfigAccessor(): string;

    public function setClient(ExternalApiClient $client): void
    {
        $this->client = $client;
    }

    public function setConfig(array $config): void
    {
        $this->config = $config;
    }

    public function setPaths(array $paths): void
    {
        $this->paths = $paths;
    }

    public function getExchangeName(): string
    {
        return $this->exchangeName;
    }
}
