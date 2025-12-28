<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Post
{
    protected $table = 'posts';

    public function setAttributes($text, $parentID, $repliedMessageID = null){
        parent::setAttributes($text, $parentID);
        $this->parent_type = "topic";
    }
}
