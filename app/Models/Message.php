<?php

namespace App\Models;

class Message extends Post
{
    protected $table = 'posts';

    public function getRepliedMessageID() {
        return $this->reply_to;
    }

    public function setAttributes($text, $parentID, $repliedMessageID = null){
        parent::setAttributes($text, $parentID, $repliedMessageID);
        $this->parent_type = "post";
    }
}
