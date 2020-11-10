<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SchedulesTest extends messagesTest
{
    use RefreshDatabase;

    /** @test */
    public function scheduleMessage(){
        $this->createMessages();
    }

    /** @test */
    public function getAllScheduledMessages(){
        $this->createMessages();
    }

    /** @test */
    public function getMyScheduledMessages(){
        $this->createMessages();
    }

    /** @test */
    public function editScheduledMessages(){
        $this->createMessages();
    }

    /** @test */
    public function deleteScheduledMessage(){
        $this->createMessages();
    }
}
