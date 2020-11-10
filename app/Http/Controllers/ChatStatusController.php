<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatStatus;

class ChatStatusController extends Controller
{
    protected function createStatus(ChatStatus $chat_status){
        return $chat_status->create($this->validateChatStatus());
    }

    protected function deleteMyStatus($id){
        ChatStatus::find($id)->delete();
    }

    protected function markStatusAsSeen($id){
        ChatStatus::find($id)->update(array('chat_status'=>'seen'));
    }

    protected function muteStatus($id){
        ChatStatus::find($id)->update(array('chat_status'=>'muted'));
    }
    
    protected function validateChatStatus(){
        return request()->validate([
            'status'      => 'required',
            'viewers_id'  => '',
            'created_by'  => '',
            'status_file' => 'required',
            'chat_status' => 'required',
            'category'    => 'required'
        ]);
    }
}
