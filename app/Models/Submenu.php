<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    protected $fillable = [
        'menu_id', 'name_uz', 'name_ru', 'name_en', 'body_uz', 'body_ru', 'body_en', 'slug', 'view_template', 'meta_title', 'meta_description', 'meta_keywords',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }


}

