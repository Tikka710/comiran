<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['mangaes'])->get();
        // dd($articles);
        return $articles;
    }
    
    public function store(Request $request)
    {
        $articles = new Article;
        $articles->thame = $request->thame;
        $articles->nickname = $request->nickname;
        $articles->save();
    }
}
