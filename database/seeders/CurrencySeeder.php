<?php

namespace Database\Seeders;

use App\Models\Currency;
use Database\Factories\CurrencyFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$currencies = [
            ['code' => 'USD', 'name' => 'US Dollar'],
            ['code' => 'EUR', 'name' => 'Euro'],
            ['code' => 'GBP', 'name' => 'British Pound'],
            ['code' => 'JPY', 'name' => 'Japanese Yen'],
            ['code' => 'INR', 'name' => 'Indian Rupee'],
            ['code' => 'AUD', 'name' => 'Australian Dollar'],
            ['code' => 'CAD', 'name' => 'Canadian Dollar'],
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }*/
        Currency::factory()->count(10)->create();
    }
}
