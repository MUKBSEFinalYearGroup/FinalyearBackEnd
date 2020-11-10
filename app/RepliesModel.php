<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepliesModel extends Model
{
    protected $guarded = [];
    protected $table = 'message_replies';
}
