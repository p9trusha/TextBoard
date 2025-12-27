<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ["name"];

    function getThreads() {
        return Post::where("parent_type", "topic")->
        where("parent", $this->getID())->whereNull("reply_to")->get()->all();
    }

    function getID() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setName(string $name) {
        $this->name = $name;
    }
}
