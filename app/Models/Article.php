<?php

namespace App\Models;

class Article extends Model
{
    protected $fillable = ['title', 'type_id', 'description', 'images', 'thumbs_up', 'type1', 'type2'];

    public function getType()
    {
        //处理文章类别
        $typeArr = config('app.type');
        $this->type_1 = $typeArr[$this->type1]['name'];
        $this->typeImg = $typeArr[$this->type1]['img'];
        $this->type_2 = $typeArr[$this->type1]['children'][$this->type2];
    }
}
