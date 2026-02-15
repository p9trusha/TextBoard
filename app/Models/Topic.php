<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ["name"];

    public const paginationCount = 10;

    public function threads() {
        return $this->morphMany(Thread::class, 'parent'); // Связь один-ко-многим
    }
}
