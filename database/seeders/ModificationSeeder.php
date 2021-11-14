<?php

namespace Database\Seeders;

use App\Models\Modification;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ModificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $modifications = [
            [
                'title' => 'Silver',
                'price' => 500,
                'product_id' => 2
            ],
            [
                'title' => 'Black',
                'price' => 400,
                'product_id' => 2
            ],
            [
                'title' => 'Dark black',
                'price' => 300,
                'product_id' => 2
            ],
            [
                'title' => 'Red',
                'price' => 200,
                'product_id' => 2
            ],
            [
                'title' => 'Silver',
                'price' => 300,
                'product_id' => 1
            ],
            [
                'title' => 'Red',
                'price' => 250,
                'product_id' => 1
            ],
        ];
        Modification::insert($modifications);
    }
}
