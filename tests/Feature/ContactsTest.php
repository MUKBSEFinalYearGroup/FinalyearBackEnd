<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactsTest extends messagesTest
{
    use RefreshDatabase;
    /** @test here, We sink with the phone contacts */
    public function createContact(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-contact',[
            ''
        ]);
    }

    /** @test here, we get all the phone contacts */
    public function getMyContacts(){
        $this->createMessages();
    }

    /** @test here, we sink with the phones update contact */
    public function updateContact(){
        $this->createMessages();
    }

    /** @test here, we sink with the phones delete contact */
    public function deleteContact(){
        $this->createMessages();
    }

    /** @test */
    public function blockContact(){
        $this->createMessages();
    }
}
