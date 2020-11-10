<?php

use Illuminate\Database\Seeder;
use App\ChatGroupContacts;

class ChatContactsGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<25; $i++){
            ChatGroupContacts::create(array(
                'contact_id' => $i,
                'group_id'   => 2,
                'created_by' => 1,
                'status'     => 'active'
            ));
        }
    }
}
