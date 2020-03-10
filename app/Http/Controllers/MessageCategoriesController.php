<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MessageCategory;
use App\Http\Resources\MessageCategoryResource;

class MessageCategoriesController extends Controller
{
    protected function createMessageCategory(MessageCategory $category){
        return $category->create($this->validateMessageCategory());
    }

    protected function editCategoryName($id, MessageCategory $category){
        MessageCategory::find($id)->update(array('category_name'=>'past papers'));
    }

    protected function getAllCategories(MessageCategory $category){
        return MessageCategoryResource::collection(MessageCategory::where('status','active')->get());
    }

    protected function deleteCategoryTemporarily($id, MessageCategory $category){
        MessageCategory::find($id)->update(array('status'=>'deleted'));
    }
    
    protected function deleteCategoryParmanetly($id){
        MessageCategory::find($id)->delete();
    }

    protected function getMyMessageCategories(){

    }
    
    protected function validateMessageCategory(){
        return request()->validate([
            'category_name' => 'required',
            'created_by'    => '',
            'package_id'    => '',
            'status'        => 'required'
        ]);
    }
}
