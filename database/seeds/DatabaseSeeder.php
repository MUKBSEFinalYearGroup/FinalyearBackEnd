<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(ChatGroupsTableSeeder::class);
        // $this->call(MessagesTableSeeder::class);
        // $this->call(ChatContactsGroupsTableSeeder::class);
        // $this->call(CallsTableSeeder::class);
        // $this->call(ChatStatusesTableSeeder::class);
        // $this->call(PackagesTableSeeder::class);
        // $this->call(SearchTermsTableSeeder::class);
        // $this->call(StatusRepliesTableSeeder::class);
        // $this->call(MessageCategoriesTableSeeder::class);
        $this->call(MessageRepliesTableSeeder::class);
    }
}
