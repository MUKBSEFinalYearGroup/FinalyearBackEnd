<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\ChatGroupContacts;

class chatgroup_contactsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function addContactToGroup(){
        $this->withoutExceptionHandling();
        $response = $this->post('api/add-contact-to-group',[
            'contact_id' => 1,
            'group_id'   => 1,
            'created_by' => 1,
            'status'     => 'active'
        ]);
        $this->assertDatabaseHas('chat_group_contacts',['contact_id'=>1]);
    }

    /** @test */
    public function removeContactFromGroup(){
        $this->addContactToGroup();
        $contact = ChatGroupContacts::first();
        $response = $this->patch('api/delete-group-contact/'.$contact->id);
        $this->assertEquals('deleted',ChatGroupContacts::first()->status);
    }

    /** @test */
    public function getAllChatGroupContacts(){
        $this->addContactToGroup();
        $response = $this->get('api/get-group-contacts');
        $response->assertOk();
    }
    /** @test */
    public function exitGroup(){
        $this->addContactToGroup();
        $contact = ChatGroupContacts::first();
        $response = $this->patch('api/exit-group/'.$contact->id);
        $this->assertEquals('exited',ChatGroupContacts::first()->status);
    }

}
