<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatGroup;
use App\Http\Resources\ChatGroupsResource;

class ChatGroupsController extends Controller
{
    protected function createChatGroup(ChatGroup $chat){
        return $chat->create($this->validateChatGroup());
    }

    protected function editChatGroup($id, ChatGroup $chat){
        ChatGroup::where('id',$id)->update(array('group_name'=>'Group_BSE31','profile_pic'=>'image/group/name'));
    }

    protected function getAllMyGroups($role_id){
        return ChatGroupsResource::collection(ChatGroup::where('role_id',$role_id)
        ->select('group_name')->get());
    }

    protected function getAllGroupsIBelongTo($id){
        return ChatGroupsResource::collection(ChatGroup::join('users','users.id','chat_groups.participants_id')
            ->where('participants_id',$id)
            ->select('group_name','name')->get());
    }

    protected function assignNewRole(){
        ChatGroup::where('id',$id)->update(array('role_id',2));
    }

    protected function validateChatGroup(){
        return request()->validate([
            'participants_id' => 'required',
            'status'          => 'required',
            'group_name'      => 'required',
            'profile_pic'     => 'required',
            'role_id'         => 'required'
        ]);
    }
}
