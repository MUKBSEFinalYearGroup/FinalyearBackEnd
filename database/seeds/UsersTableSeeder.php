<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        $contacts_array = ['+256 704 683444','+256 703 722071','+971 52 802 7626','+256 773 046537','+256 771 612005',
        '+256 700 518630','+256 771 612005','+256 702 632616','+256 756 626881','+256 704 557361','+256 783 537473',
        '+256 774 626442','+256 777 360226','+256 702 935078','+256 751 994146','+256 757 441284',
        '+256 703 571329','+256 788 922290','+256 779 802410','+256 772 733022','+256 752 242226','+256 797 307421',
        '+256 788 938927','+256 775 314610'];
    
        for($i=0; $i < count($contacts_array); $i++){ 
            User::create([
                'name'           => $faker->name,
                'email'          => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'contact_number' => $contacts_array[$i]
            ]);
        }
    }
}
