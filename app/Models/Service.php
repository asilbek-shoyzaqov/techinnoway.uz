<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'submenu_id', 'name_uz', 'name_ru', 'name_en', 'body_uz', 'body_ru', 'body_en', 'image', 'slug', 'view_template', 'meta_title', 'meta_description', 'meta_keywords',
    ];

    public function submenu()
    {
        return $this->belongsTo(Submenu::class);
    }
}

