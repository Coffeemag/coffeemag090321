<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AttributeValue;

class AttributeValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weights = ['250gr', '500gr', '1kg'];

        foreach ($weights as $weight)
        {
            AttributeValue::create([
                'attribute_id'      =>  1,
                'value'             =>  $weight,
                'price'             =>  null,
            ]);
        }
    }
}
