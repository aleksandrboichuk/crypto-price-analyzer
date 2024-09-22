<?php

namespace App\Console\Commands;

use App\Services\CryptoExchangeComparison;
use Illuminate\Console\Command;

class CompareExchanges extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchanges:compare {first_currency} {second_currency}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cryptoExchangeComparison = (new CryptoExchangeComparison);

        $firstCurrency = $this->argument('first_currency');
        $secondCurrency = $this->argument('second_currency');

        $result = $cryptoExchangeComparison->compareCurrencyPairPrices($firstCurrency, $secondCurrency);

        foreach ($result as $exchange => $price) {
            if($price){
                $this->info("$firstCurrency/$secondCurrency price on $exchange: $$price");
            }else{
                $this->warn("$firstCurrency/$secondCurrency on $exchange does not exists");
            }
        }


    }
}
