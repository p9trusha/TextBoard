<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Post extends Model
{
    protected $fillable = ['text', 'parent', 'parent_type', 'reply_to'];

    public function parent(): MorphTo {
        return $this->morphTo(); // Связывает с различными моделями-родителями
    }

    public function messages(): MorphMany {
        return $this->morphMany(Message::class, 'parent'); // Связь один-ко-многим
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Message::class, 'reply_to');
    }

    public function repliedTo(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'reply_to');
    }

    function getID() {
        if ($this) {
            return $this->id;
        }
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
        $this->parent_id = $parentID;
        $this->reply_to = $repliedMessageID;
    }
}
