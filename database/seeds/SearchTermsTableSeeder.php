<?php

use Illuminate\Database\Seeder;
use App\SearchTerms;
use Faker\Generator as Faker;

class SearchTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=1; $i<10; $i++){
            SearchTerms::create(array(
                'search_term_name' => $faker->country,
                'status'           => 'active',
                'created_by'       => 1,
            ));
        }
    }
}
