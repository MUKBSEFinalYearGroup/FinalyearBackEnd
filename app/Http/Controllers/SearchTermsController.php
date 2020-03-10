<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SearchTerms;
use App\Http\Resources\SearchTermsResource;

class SearchTermsController extends Controller
{
    protected function createSearchTerms(SearchTerms $search_term){
        return $search_term->create($this->validateSearchTerms());
    }

    protected function getAllSearchTerms(){
        return SearchTermsResource::collection(SearchTerms::where('status','active')->get());
    }

    protected function editSearchTerm($id){
        SearchTerms::find($id)->update(array('search_term_name' => 'BSSE301'));
    }

    protected function temporarilyDeleteSearchTerm($id){
        SearchTerms::find($id)->update(array('status' => 'deleted'));
    }

    protected function parmanetlyDeleteSearchTerm($id){
        SearchTerms::find($id)->delete();
    }

    protected function validateSearchTerms(){
        return request()->validate([
            'search_term_name' => 'required',
            'status'           => 'required',
            'created_by'       => ''
        ]);
    }
}
