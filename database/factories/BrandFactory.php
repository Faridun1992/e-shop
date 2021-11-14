<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

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
            'images' => $this->faker->image('public/pink/images', 350, 250, 'watches'),
            'description' => $this->faker->realText(200),
            'created_at' => now(),
        ];
    }
}
