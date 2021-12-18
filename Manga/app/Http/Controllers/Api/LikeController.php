<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class LikeController extends Controller
{
    public function index(Request $request)
    {
        $article = Article::find($request->article_id);
        dd($article);
        $article->attach($request->article_id);
    }

    // public function like(Request $request)
    // {
    //     $article = Article::find($request->article_id);
    //     // dd($article);
    //     $article->attach($request->article_id);
    // }
}
