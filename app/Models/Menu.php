<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'body_uz', 'body_ru', 'body_en', 'slug', 'view_template', 'meta_title', 'meta_description', 'meta_keywords',
    ];

    public function submenus()
    {
        return $this->hasMany(Submenu::class);
    }
}

