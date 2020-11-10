<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\ChatStatus;

class ChatStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=1; $i<10; $i++){
            ChatStatus::create(array(
                'status'      => 'active',
                'viewers_id'  => $i,
                'created_by'  => $i+1,
                'chat_status' => 'active',
                'status_file' => $faker->imageUrl($width = 200, $height = 200),
                'category'    => 'image'
            ));
        }
    }
}
