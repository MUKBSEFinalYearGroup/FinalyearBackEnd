<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\SearchTerms;

class SearchTermsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createSearchTerm(){
        $this->withoutExceptionHandling();
        $response = $this->post('api/create-search-team',[
            'search_term_name' => 'BSE301',
            'status'           => 'active',
            'created_by'       => '',
        ]);
        $this->assertDatabaseHas('search_terms',['search_term_name'=>'BSE301']);
    }

    /** @test */
    public function getAllSearchTerms(){
        $this->createSearchTerm();
        $response = $this->get('/api/get-all-search-terms');
        $response->assertOk();
    }

    /** @test */
    public function editSearchTerms(){
        $this->createSearchTerm();
        $search_term = SearchTerms::first();
        $response = $this->patch('/api/edit-search-term/'.$search_term->id);
        $this->assertEquals('BSSE301', SearchTerms::first()->search_term_name);
    }

    /** @test */
    public function deleteSearchTermTemporarily(){
        $this->createSearchTerm();
        $search_term = SearchTerms::first();
        $response = $this->patch('/api/temporariy-delete-search-term/'.$search_term->id);
        $this->assertEquals('deleted', SearchTerms::first()->status);
    }

    /** @test */
    public function deleteSearchTermPermanetly(){
        $this->createSearchTerm();
        $search_term = SearchTerms::first();
        $response = $this->delete('/api/parmanetly-delete-search-term/'.$search_term->id);
        $this->assertCount(0, SearchTerms::all());
    }
}
