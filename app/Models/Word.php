<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'text_uz',
        'text_ru',
        'text_en',
        'url'
    ];
}
