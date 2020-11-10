<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Calls;

class CallsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function makeACall(){
        $this->withoutExceptionHandling();
        $response = $this->post('/api/make-a-call',[
            'caller_id'   => 1,
            'reciever_id' => 1,
            'call_type'   => 1,
            'status'      => 'active' 
        ]);
        $this->assertDatabaseHas('calls',['call_type'=>1]);
    }

    /** @test */
    public function rejectCall(){
        $this->makeACall();
        $call = Calls::first();
        $response = $this->patch('/api/reject-call/'.$call->id);
        $this->assertEquals('rejected',Calls::first()->status);
    }

    /** @test */
    public function getCallHistory(){
        $this->makeACall();
        $response = $this->get('/api/get-all-call-history');
        $response->assertOk();
    }

    /** @test */
    public function deleteCallHistoryForOneCall(){
        $this->makeACall();
        $call = Calls::first();
        $response = $this->patch('/api/clear-call-history/'.$call->id);
        $this->assertEquals('cleared',Calls::first()->status);
    }
}
