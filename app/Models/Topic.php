<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ["name"];

    public function threads() {
        return $this->morphMany(Thread::class, 'parent'); // Связь один-ко-многим
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
