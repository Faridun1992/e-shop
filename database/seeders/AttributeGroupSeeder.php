<?php

namespace Database\Seeders;

use App\Models\Attribute_group;
use Illuminate\Database\Seeder;

class AttributeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attribute_group = [
            [
                'title' => 'Механизм'
            ],
            [
                'title' => 'Стекло'
            ],
            [
                'title' => 'Ремешок'
            ],
            [
                'title' => 'Корпус'
            ],
            [
                'title' => 'Индикация'
            ]

        ];

        Attribute_group::insert($attribute_group);
    }
}
