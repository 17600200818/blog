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

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('title', 'like', '%'.$search.'%');
        }else {
            return $query;
        }
    }

    public function scopeType($query, $type1, $type2)
    {
        $where = [];
        if ($type1) {
            $where['type1'] = $type1;
        }
        if ($type2) {
            $where['type2'] = $type2;
        }
        if (!empty($where)) {
            return $query->where($where);
        }else {
            return $query;
        }
    }
}
