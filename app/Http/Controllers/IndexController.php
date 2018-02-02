<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request, Article $article)
    {
        $perPage = 4;

        if ($request['query']) {
            $list = $article->search($request['query'])->recent()->simplePaginate($perPage);
        }else {
            $list = $article->type($request->type1, $request->type2)->recent()->simplePaginate($perPage);
        }


        //处理文章类别
        $typeArr = config('app.type');
        foreach ($list as $k => $v) {
            $list[$k]->getType();
        }

        //处理分页
        if ($request['query']) {
            $pageCount = ceil($article->search($request['query'])->count()/$perPage);
        }else {
            $pageCount = ceil($article->type($request->type1, $request->type2)->count()/$perPage);
        }

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
