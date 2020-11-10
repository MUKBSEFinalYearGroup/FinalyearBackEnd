<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\ChatStatus;

class ChatStatusTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function addChatStatus(){
        $this->withoutExceptionHandling();
        $response = $this->post('/api/create-chat-status',[
            'status' => 'active', //can be active or expired
            'viewers_id'  => '',
            'created_by'  => '',
            'status_file' => 'this is the status',
            'chat_status' => 'active', // can bee seen, muted  
            'category'    => 'image', //can be image or text, or video takes 30 seconds, can play back 
        ]);
        $this->assertDatabaseHas('chat_statuses',['status'=>'active']);
    }

    /** @test */
    public function deleteMyChatStatus(){
        $this->addChatStatus();
        $chat = ChatStatus::first();
        $response = $this->delete('/api/delete-my-status/'.$chat->id);
        $this->assertCount(0, ChatStatus::all());
    }

    /** @test */
    public function seenStatus(){
        $this->addChatStatus();
        $chat = ChatStatus::first();
        $response = $this->patch('/api/mark-status-as-seen/'.$chat->id);
        $this->assertEquals('seen',ChatStatus::first()->chat_status);
    }

    /** @test */
    public function muteStatus(){
        $this->addChatStatus();
        $chat = ChatStatus::first();
        $response = $this->patch('/api/mark-status-as-muted/'.$chat->id);
        $this->assertEquals('muted',ChatStatus::first()->chat_status);
    }
}
