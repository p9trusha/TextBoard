<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['text', 'parent', 'parent_type', 'reply_to'];

    function getID() {
        return $this->id;
    }

    public function getText() {
        return $this->text;
    }

    public function getCreatedDate() {
        return $this->created_at;
    }

    function setAttributes($text, $parentID, $repliedMessageID = null)
    {
        $this->text = $text;
        $this->parent = $parentID;
        $this->reply_to = $repliedMessageID;
    }
}
