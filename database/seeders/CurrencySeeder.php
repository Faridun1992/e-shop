<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
                [
                    'title' => 'Somon',
                    'code' => 'TJS',
                    'symbol_right' => 'смн',
                    'value' => 11.32,
                    'base' => 0
                ],
                [
                    'title' => 'Dollar',
                    'code' => 'USD',
                    'symbol_left' => '$',
                    'value' => 1,
                    'base' => 1
                ],
                [
                    'title' => 'Euro',
                    'code' => 'EUR',
                    'symbol_left' => '€',
                    'value' => 0.88,
                    'base' => 0
                ]

                        ];

            Currency::insert($currencies);
    }
}
