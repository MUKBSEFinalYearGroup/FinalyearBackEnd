<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Packages;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=1; $i<10; $i++){
            Packages::create(array(
                'package_name' => $faker->city,
                'bill'         => 3000 + $i*200,
                'created_by'   => 1,
                'status'       => 'active'
            ));
        }
    }
}
