<?php

namespace Database\Seeders;

use App\Models\Attribute_group;
use App\Models\Attribute_value;
use App\Models\Product;
use Illuminate\Database\Seeder;

class Attribute_ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attrGroups = Attribute_group::all();

        foreach ($attrGroups as $attrGroup){
            Attribute_value::factory(4)->create([
                'attr_group_id' => $attrGroup->id
            ]);
        }
    }
}
