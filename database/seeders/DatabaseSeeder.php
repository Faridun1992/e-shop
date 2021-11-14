<?php

namespace Database\Seeders;

use App\Models\Attribute_value;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(BrandSeeder::class);
        //$this->call(ProductSeeder::class);
        //$this->call(CurrencySeeder::class);
        //$this->call(CategorySeeder::class);
        //$this->call(ModificationSeeder::class);
        //$this->call(AttributeGroupSeeder::class);
        //$this->call(Attribute_ValueSeeder::class);
       /* $attr = Attribute_value::all();
        Product::all()->each(function ($product) use ($attr){
            $product->values()->attach($attr->random(rand(1, 3)));
        });*/

    }
}
