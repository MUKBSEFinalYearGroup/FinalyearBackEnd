<?php

use Illuminate\Database\Seeder;
use App\RepliesModel as MessageReply;
use Faker\Generator as Faker;

class MessageRepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=1; $i<10; $i++){
            MessageReply::create(array(
                'message_reply' => $faker->text,
                'message_id'    => 1,
                'senders_id'    => $i,
                'recievers_id'  => $i+1,
                'status'        => 'read'
            ));
        }
    }
}
