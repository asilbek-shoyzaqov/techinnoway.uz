<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'slug', 'meta_title', 'meta_description', 'meta_keywords'
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}

