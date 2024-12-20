<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'post_id', 'image', 'file'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

