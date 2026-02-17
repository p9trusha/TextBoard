<?php

namespace App\Models;

class Message extends Post
{
    protected $fillable = ["text", 'reply_to', 'parent_type', 'parent_id'];

    protected $table = 'posts';
}
