<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Message;
use App\User;


class messagesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createMessages(){
        $this->withoutExceptionHandling();
        $response = $this->post('api/create-message',[
            'message' => 'This is the message',
            'senders_id'    => '',
            'recievers_id'  => '',
            'status'        => 'not read',
            'category_id'   => 1
        ]);
        $this->assertCount(1, Message::all());
    }

    /** @test */
    public function editMessage(){
        $this->createMessages();
        $message_id = Message::first();
        $this->withoutExceptionHandling();
        $response = $this->patch('api/edit-message/'.$message_id->id,[
            'message' => 'This is the message edited',
            'senders_id'    => '',
            'recievers_id'  => '',
            'status'        => 'not read',
            'category_id'   => 1
        ]);
        $this->assertEquals('This is the message edited', Message::first()->message);
    }

    /** @test */
    public function temporarilyDeleteMessage(){
        $this->createMessages();
        $message_id = Message::first();
        $this->withoutExceptionHandling();
        $response = $this->patch('api/delete-message/'.$message_id->id);
        $this->assertEquals('not read', $message_id->status);
    }

    /** @test */
    public function parmanetlyDeleteMessage(){
        $this->createMessages();
        $message_id = Message::first();
        $this->withoutExceptionHandling();
        $response = $this->delete('api/parmanently-delete-message/'.$message_id->id);
        $this->assertCount(0, Message::all());
    }

    /*@test */
    public function markMessageAsRead(){
        $this->createMessages();
        $message_id = Message::first();
        $this->withoutExceptionHandling();
        $response = $this->patch('api/mark-read-message/'.$message_id->id,[
            'status' => 'read'
        ]);
        $this->assertEquals('read', $message_id->status);
    }

    /** @test */
    public function getMessages(){
        $this->createMessages();
        $this->withoutExceptionHandling();
        $response = $this->get('api/get-messages');
        $response->assertOk();
    }

    /**@test */
    public function getAllMySentMessages(){
        $this->createMessages();
        $this->withoutExceptionHandling();
        $response = $this->get('api/get-my-sent-messages/1');
        $response->assertOk();
    }

    /**@test */
    public function getAllMyRecievedMessages(){
        $this->createMessages();
        $this->withoutExceptionHandling();
        $response = $this->get('api/get-my-recieved-messages/1');
        $response->assertOk();
    }

}
