<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostPhoto extends Model
{
    protected $fillable = [
        'photo'
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
