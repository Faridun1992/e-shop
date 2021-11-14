<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->realText(),
            'quantity' => $this->faker->numberBetween(1, 20),
            'price' => $this->faker->numberBetween(100, 200),
            'old_price' => $this->faker->numberBetween(200, 220),
            'status' => TRUE,
            'images' => $this->faker->image('public/pink/images', 125, 200, 'watches'),
            'description' => $this->faker->realText(),
            'hit' => TRUE,
            'created_at' => now()
        ];
    }
}
