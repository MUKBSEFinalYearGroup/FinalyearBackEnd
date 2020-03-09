<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\ChatGroup;

class ChatGroupTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function createChatGroup(){
        $this->withoutExceptionHandling();
        $response = $this->post('/api/create-chat-group',[
            'participants_id' => 1, //the participants in the group(added members)
            'status'          => 'participant',
            'group_name'      => 'Group_31',
            'profile_pic'     => 'image/path',
            'role_id'         => 1 //admin
        ]);
        $this->assertDatabaseHas('chat_groups',['role_id'=>1]);
    }

    /** @test */
    public function editGroupName(){
        $this->createChatGroup();
        $group = ChatGroup::first();
        $response = $this->patch('/api/edit-chat-group/'.$group->id);
        $this->assertEquals('Group_BSE31',ChatGroup::first()->group_name);
        $this->assertEquals('image/group/name',ChatGroup::first()->profile_pic);
    }

    /**@test */
    public function getAllMyGroups(){
        $this->createChatGroup();
        $response = $this->get('/api/get-all-my-groups');
        $response->assertOk();
    }

    /**@test */
    public function getAllGroupsIBelongTo(){
        $this->createChatGroup();
        $response = $this->get('/api/get-all-groups-i-belong-to');
        $response->assertOk();
    }

    /** @test */
    public function assignNewAdmin(){
        $this->createChatGroup();
        $response = $this->patch('/api/assign-new-role/1');
        $this->assertEquals(2,ChatGroup::first()->role_id);
    }
}
