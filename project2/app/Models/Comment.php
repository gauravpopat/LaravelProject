<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'post' => Post::class,
    'video' => Video::class
]);
class Comment extends Model
{
    use HasFactory;

    public function commentable()
    {
        return $this->morphTo();
    }
}
