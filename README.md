Console command in Laravel for price analysis on the following crypto exchanges:
- binance.com
- jbex.com
- poloniex.com
- bybit.com
- whitebit.com

[Command](app/Console/Commands/CompareExchanges.php) obtains the lowest and highest price between the currency pair selected by the user, and show on which exchange this rate (for example - BTC/USDT, display the rate and name of the exchange);

Executing a command in the command line: <br>
`php artisan exchanges:compare {first_currency} {second_currency}`

Example: <br>
`php artisan exchanges:compare usdc usdt`
