<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RepliesModel;
use App\status_replies;

class RepliesController extends Controller
{
    protected function replyToMessage(RepliesModel $reply_model){
        return $reply_model->create($this->validateMessageReply());
    }

    protected function replyToChatStatus(status_replies $status_reply_model){
        return $status_reply_model->create($this->validateStatusReply());
    }

    protected function deleteMessageReply($id, RepliesModel $reply_model){
        $reply_model->find($id)->delete();
    }

    protected function deleteStatusReply($id, status_replies $status_reply_model){
        $status_reply_model->find($id)->delete();
    }

    protected function validateMessageReply(){
        return request()->validate([
            'message_reply' => 'required',
            'senders_id'    => '',
            'recievers_id'  => '',
            'status'        => 'required',
            'message_id'    => 'required'
        ]);
    }

    protected function validateStatusReply(){
        return request()->validate([
            'viewers_id'    => '',
            'created_by'    => '',
            'status_file'   => 'required',
            'chat_status'   => 'required',
            'category'      => 'required',
            'reply_message' => 'required'
        ]);
    }
}
