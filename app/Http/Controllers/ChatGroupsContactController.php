<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatGroupContacts;
use App\Http\Resources\ChatGroupContactsResource;

class ChatGroupsContactController extends Controller
{
    protected function addContactToGroup(ChatGroupContacts $chatgroup_contact){
        return $chatgroup_contact->create($this->validateContact());
    }

    protected function deletegroupContact($id, ChatGroupContacts $chatgroup_contact){
        $chatgroup_contact->find($id)->update(array('status'=>'deleted'));
    }

    protected function getGroupContacts(ChatGroupContacts $chatgroup_contact){
        //we are supposed to update the group id so that we pick by group id
        return ChatGroupContactsResource::collection(ChatGroupContacts::join('users','users.id','chat_group_contacts.created_by')
        ->join('chat_groups','chat_groups.id','chat_group_contacts.group_id')
        ->paginate(10));
    }

    protected function exitGroup($id, ChatGroupContacts $chatgroup_contact){
        $chatgroup_contact->find($id)->update(array('status'=>'exited'));
    }

    protected function validateContact(){
        return request()->validate([
            'contact_id' => 'required',
            'group_id'   => 'required',
            'created_by' => 'required'
        ]);
    }
}
