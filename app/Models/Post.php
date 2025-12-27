<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    function getID() {
        return $this->id;
    }

    function setText($text)
    {
        $this->text = $text;
    }

    function setParent($parentID)
    {
        $this->parent = $parentID;
    }

    function setParentType($parentType)
    {
        $this->parent_type = $parentType;
    }

    function setReplyTo($messageID)
    {
        $this->reply_to = $messageID;
    }

    function setAttributes($text, $parentID, $parentType, $replyTo = null)
    {
        $this->setText($text);
        $this->setParent($parentID);
        $this->setParentType($parentType);
        $this->setReplyTo($replyTo);
    }
}
