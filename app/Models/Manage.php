<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manage extends Model
{
    protected $fillable = [
        'name_uz', 'name_ru', 'name_en', 'image','profession_uz', 'profession_ru', 'profession_en', 'email', 'tel', 'reception_time', 'address_uz', 'address_ru', 'address_en', 'body_uz', 'body_ru', 'body_en', 'slug', 'view_template', 'meta_title', 'meta_description', 'meta_keywords',
    ];

}

