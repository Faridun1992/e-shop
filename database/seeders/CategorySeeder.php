<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title1 = 'Men';
       Category::firstOrCreate([
            'title' => $title1,
            'slug' => Str::slug($title1),
            'description' => $title1,
            'created_at' => now()
         ]);

      $subtitle1 = 'Механические';

        Category::firstOrCreate([
            'title' => $subtitle1,
            'slug' => Str::slug($subtitle1).'1',
            'description' => $subtitle1,
            'created_at' => now()
        ]);

        $subtitle2 = 'Электронные';
        Category::firstOrCreate([
            'title' => $subtitle2,
            'slug' => Str::slug($subtitle2).'1',
            'description' => $subtitle2,
            'created_at' => now()
        ]);


        $title2 = 'Women';
        Category::firstOrCreate([
            'title' => $title2,
            'slug' => Str::slug($title2),
            'description' => $title2,
            'created_at' => now()
        ]);


        Category::firstOrCreate([
            'title' => $subtitle1,
            'slug' => Str::slug($subtitle1).'2',
            'description' => $subtitle1,
            'created_at' => now()
        ]);

        Category::firstOrCreate([
            'title' => $subtitle2,
            'slug' => Str::slug($subtitle2).'2',
            'description' => $subtitle2,
            'created_at' => now()
        ]);

        $title3 = 'Kids';
        Category::firstOrCreate([
            'title' => $title3,
            'slug' => Str::slug($title3),
            'description' => $title3,
            'created_at' => now()
        ]);

        Category::firstOrCreate([
            'title' => $subtitle1,
            'slug' => Str::slug($subtitle1).'3',
            'description' => $subtitle1,
            'created_at' => now()
        ]);

        Category::firstOrCreate([
            'title' => $subtitle2,
            'slug' => Str::slug($subtitle2).'3',
            'description' => $subtitle2,
            //'parent_id' => Category::where('title', $title3)->id(),
            'created_at' => now()
        ]);


         //$category = Category::all();
         Category::factory(18)->create()->each(
            function($category){
                $category->categories()->attach($category);
            }
        );
    }
}
