<?php

use Illuminate\Database\Seeder;
use App\Calls;

class CallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<3; $i++){
            Calls::create(array(
                'caller_id'   => 1,
                'reciever_id' => 2,
                'call_type'   => 'video',
                'status'      => 'active'
            ));
        }
    }
}
