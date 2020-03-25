<?php

use Illuminate\Database\Seeder;
use App\MessageCategory;
use Faker\Generator as Faker;

class MessageCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=1; $i<10; $i++){
            MessageCategory::create(array(
                'category_name' => $faker->name,
                'created_by'    => 1,
                'package_id'    => $i,
                'status'        => 'active'
            ));
        }
    }
}
