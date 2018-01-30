<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request, Article $article)
    {
        $perPage = 4;
        $list = $article->recent()->simplePaginate($perPage);
        //处理文章类别
        $typeArr = config('app.type');
        foreach ($list as $k => $v) {
            $type = explode('_', $v->type);
            $list[$k]->type1 = $typeArr[$type[0]]['name'];
            $list[$k]->typeImg = $typeArr[$type[0]]['img'];
            $list[$k]->type2 = $typeArr[$type[0]]['children'][$type[1]];
        }

        //处理分页
        $pageCount = ceil($article->count()/$perPage);
        $page = $request->page;
        if (!$page) {
            $page = 1;
        }
        $prePage = $page-1;
        $nextPage = $page+1;
        if ($page == $pageCount) {
            $nextPage = 0;
        }

        return view('index.index', compact('list', 'prePage', 'nextPage'));
    }
}
