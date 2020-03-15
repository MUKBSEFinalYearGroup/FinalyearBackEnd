<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calls as CallsModel;
use App\Http\Resources\CallsResource;

class Calls extends Controller
{
    protected function makeACall(CallsModel $call){
        return $call->create($this->validateCall());
    }

    protected function rejectCall($id, CallsModel $call){
        $call->find($id)->update(array('status'=>'rejected'));
    }

    protected function getAllHistory(CallsModel $call){
        return CallsResource::collection($call->where('status','active')->get());
    }

    protected function clearAllHistory($id, CallsModel $call){
        $call->find($id)->update(array('status'=>'cleared'));
    }

    protected function validateCall(){
        return request()->validate([
            'caller_id'   => 'required',
            'reciever_id' => 'required',
            'call_type'   => 'required',
            'status'      => 'required'
        ]);
    }
}
