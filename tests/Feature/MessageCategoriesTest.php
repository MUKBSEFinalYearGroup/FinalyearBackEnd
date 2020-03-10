<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\MessageCategory;

class MessageCategoriesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createCategory(){
        $this->withoutExceptionHandling();
        $response = $this->post('api/create-message-category',[
            'category_name' => 'passed papers',
            'created_by'    => '',
            'package_id'    => '',
            'status'        => 'active'
        ]);
        $this->assertDatabaseHas('message_categories',['category_name'=>'passed papers']);
    }

    /** @test */
    public function editCategoryName(){
        $this->createCategory();
        $category = MessageCategory::first();
        $response = $this->patch('api/edit-category-name/'.$category->id);
        $this->assertEquals('past papers',MessageCategory::first()->category_name);
    }

    /** @test */
    public function getMessageCategories(){
        $this->createCategory();
        $response = $this->get('/api/get-message-categories');
        $response->assertOk();
    }

    /**
     * to run if someone wants to see there message categories they created
     *  @test 
     * */
    public function getMyMessageCategories(){
        $this->createCategory();
        $response = $this->get('/api/get-my-message-categories');
        $response->assertOk();
    }

    /** @test */
    public function deleteMessageCategoryTemporariry(){
        $this->createCategory();
        $category = MessageCategory::first();
        $response = $this->patch('/api/delete-cateory/'.$category->id);
        $this->assertEquals('deleted',MessageCategory::first()->status);
    }

    /** @test */
    public function deleteMessageCategoryPamanetly(){
        $this->createCategory();
        $category = MessageCategory::first();
        $response = $this->delete('/api/delete-cateory-parmanetly/'.$category->id);
        $this->assertCount(0,MessageCategory::all());
    }
}
