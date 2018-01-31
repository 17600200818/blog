<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;

class ArticlesController extends Controller
{
    public function show(Article $article)
    {
        $article->getType();
        return view('articles.show', compact('article'));
    }

    public function create(Article $article)
    {
        return view('articles.create_and_edit', compact('article'));
    }

    public function store(Request $request, Article $article)
    {
        $article->fill($request->all());
        $article->body = $request->body;
        $article->save();
        return redirect()->route('index')->with('success', '成功删除！');
    }

    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'topics', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }
}
