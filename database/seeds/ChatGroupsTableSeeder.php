<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\ChatGroup;

class ChatGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $group_names = ["Pride of London","Jazzys introduction Ceremony","BSSE IV","BSSE IV Eve",
        "How To Make A Big Dick","GoproUg","Final Year Project"];

        for($i=0; $i < count($group_names); $i++){ 
            ChatGroup::create([
                'participants_id'  => $i+1,
                'role_id'          => 4, //user
                'status'           => 'participant',
                'group_name'       => $group_names[$i],
                'profile_pic'      => $faker->imageUrl($width = 200, $height = 200),
            ]);
        }
    }
}
