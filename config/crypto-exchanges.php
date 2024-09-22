<?php
return [
    'binance' => [
        'base_api_url' => env('BINANCE_BASE_API_URL'),
        'paths' => [
            'spot' => [
                'ticker_prices_path' => '/api/v3/ticker/price'
            ]
        ]
    ],
    'jucoin' => [
        'base_api_url' => env('JUCOIN_BASE_API_URL'),
        'paths' => [
            'spot' => [
                'ticker_prices_path' => '/openapi/quote/v1/ticker/price'
            ]
        ]
    ],
    'poloniex' => [
        'base_api_url' => env('POLONIEX_BASE_API_URL'),
        'paths' => [
            'spot' => [
                'ticker_prices_path' => '/markets/price',
                'ticker_price_path' => '/markets/{symbol}/price',
            ]
        ]
    ],
    'bybit' => [
        'base_api_url' => env('BYBIT_BASE_API_URL'),
        'paths' => [
            'spot' => [
                'ticker_prices_path' => '/v5/market/tickers'
            ]
        ]
    ],
    'whitebit' => [
        'base_api_url' => env('WHITEBIT_BASE_API_URL'),
        'paths' => [
            'spot' => [
                'ticker_prices_path' => '/api/v4/public/ticker'
            ]
        ]
    ]
];
