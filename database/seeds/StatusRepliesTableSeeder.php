<?php

use Illuminate\Database\Seeder;
use App\status_replies;
use Faker\Generator as Faker;

class StatusRepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=1; $i<10; $i++){
            status_replies::create(array(
                'viewers_id' => $i,
                'status_file' => 1,
                'created_by'  => 1,
                'status'      => 'active',
                'chat_status' => 'seen',
                'category'    => 'Text',
                'reply_message' => $faker->text,
            ));
        }
    }
}
