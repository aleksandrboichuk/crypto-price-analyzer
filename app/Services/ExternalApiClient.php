<?php

namespace App\Services;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Spatie\LaravelData\Data;

class ExternalApiClient
{
    protected Client $client;

    public function __construct(
        protected string|null $baseApiUrl,
        protected string|null $apiKeyName = null,
        protected string|null $apiKeyValue = null,
    )
    {
        $this->setClient();
    }

    public function get(
        string $path,
        array $data = [],
        array $headers = [],
        ?string $responseKey = null,
        string|null $defaultKey = null,
        ?string $dto = null,
        array $pathVariables = []
    ): string|null|\stdClass|Data
    {
        try{

            $url = $this->baseApiUrl
                . $this->preparePathWithVariables($path, $pathVariables)
                . (!empty($data) ? "?" . http_build_query($data) : "");

            $response = $this->client->get($url, [
                'headers' => $headers
            ]);

            return $this->processResponse($response, $responseKey, $defaultKey, $dto);

        }catch (\Throwable $exception){

            dump($exception);

            return null;
        }
    }

    public function post(
        string $path,
        array $data = [],
        array $headers = [],
        string $responseKey = null,
        string|null $defaultKey = null,
        ?string $dto = null,
        array $pathVariables = []
    ): string|null|\stdClass|Data
    {
        try{

            $url = $this->baseApiUrl . $this->preparePathWithVariables($path, $pathVariables);

            $response = $this->client->post($url, [
                "body" => json_encode($data),
                'headers' => $headers
            ]);

            return $this->processResponse($response, $responseKey, $defaultKey, $dto);

        }catch (\Throwable $exception){

            dump($exception);

            return null;
        }
    }

    protected function processResponse(
        ResponseInterface $response,
        string|null $responseKey = null,
        string|null $defaultKey = null,
        string|null $dto = null,
    ): mixed
    {
        $body = json_decode($response->getBody());

        if($response->getStatusCode() != 200){

            dump($body);

            return $dto ? $dto::from([]) : $body;
        }

        $result = null;

        if(isset($body->$responseKey)) $result = $body->$responseKey;

        elseif(isset($body->$defaultKey)) $result = $body->$defaultKey;

        if($dto) {
            return $dto::from(
                json_decode(
                    json_encode($result instanceof \stdClass ? $result : $body),
                    true
                )
            );
        }

        return $result ?? $body;
    }

    protected function preparePathWithVariables(string $path, array $pathVariables): array|string|null
    {
        if(!empty($pathVariables)){
            foreach ($pathVariables as $variable => $value) {
                if(!empty($value) && preg_match("#\{$variable\}#", $path)){
                    $path = preg_replace("#\{$variable\}#", $value, $path);
                }
            }
        }

        return $path;
    }

    public function setApiKeyValue(string $apiKey): void
    {
        $this->apiKeyValue = $apiKey;
    }

    public function setBaseApiUrl(string $baseApiUrl): void
    {
        $this->baseApiUrl = $baseApiUrl;
    }

    public function setClient(Client $client = null): void
    {
        $this->client = $client ?? new Client([
            'headers' => $this->prepareHeaders(),
            'http_errors' => false
        ]);
    }

    protected function prepareHeaders(): array
    {
        $headers = [
            "Content-Type" => "application/json"
        ];

        if($this->apiKeyName && $this->apiKeyValue){
            $headers[$this->apiKeyName] = $this->apiKeyValue;
        }

        return $headers;
    }
}
