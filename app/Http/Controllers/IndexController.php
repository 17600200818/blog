<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request, Article $article)
    {
        return redirect()->route('articles.list');
    }
}
