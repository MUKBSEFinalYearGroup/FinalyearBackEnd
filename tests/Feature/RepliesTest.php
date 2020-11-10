<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Message;
use App\ChatStatus;
use App\RepliesModel;
use App\status_replies;

class RepliesTest extends messagesTest
{
    use RefreshDatabase;

    /** @test */
    public function createMessageToReply(){
        $this->createMessages();
        $this->withoutExceptionHandling();
        $message_id = Message::first();
        $response = $this->post('api/reply-to-message/'.$message_id->id,[
            'message_reply' => 'This is the message reply',
            'senders_id'    => '',
            'recievers_id'  => '',
            'status'        => 'not read',
            'message_id'    => $message_id->id
        ]);
        $this->assertDatabaseHas('message_replies',['message_reply'=>'This is the message reply']);
    }

    /** @test */
    public function createStatusReply(){
        $this->addChatStatus();
        $reply = ChatStatus::first();
        $response = $this->post('api/reply-to-status/'.$reply->id,[
            'viewers_id'    => '',
            'created_by'    => '',
            'status_file'   => 'this is the status',
            'chat_status'   => 'active', // can bee seen, muted  
            'category'      => 'image', //can be image or text, or video takes 30 seconds, can play back 
            'reply_message' => 'This is a reply to the chatapp status'
        ]);
        $this->assertDatabaseHas('status_replies',['reply_message'=>'This is a reply to the chatapp status']);
    }

    /** @test */
    public function deleteMessageReply(){
        $this->createMessageToReply();
        $messageid = RepliesModel::first();
        $response = $this->delete('api/delete-message-reply/'.$messageid->id);
        $this->assertCount(0,RepliesModel::all());
    }

    /** @test */
    public function deleteStatusReply(){
        $this->createStatusReply();
        $reply = status_replies::first();
        $response = $this->delete('api/delete-status-reply/'.$reply->id);
        $this->assertCount(0,RepliesModel::all());
    }
}
