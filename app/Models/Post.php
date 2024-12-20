<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'title_uz',
        'title_ru',
        'title_en',
        'text_uz',
        'text_ru',
        'text_en',
        'slug',
        'view',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'created_at',
    ];

    public function category()
    {
        return $this->belongsTo ( Category::class );
    }

    public function user()
    {
        return $this->belongsTo ( User::class );
    }


    public function files()
    {
        return $this->hasMany ( File::class );
    }

}

