<?php

namespace App\Models;

class Article extends Model
{
    protected $fillable = ['title', 'type_id', 'description', 'images', 'thumbs_up'];
}
