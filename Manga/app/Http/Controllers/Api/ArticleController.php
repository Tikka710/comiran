<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        // dd($articles);
        return $articles;
    }
    
    public function store(Request $request)
    {
        $articles = new Article;

        $selectedImage = $request->input('img_url');
        $selectedSource = $request->input('source_url');
        // dd($selectedImage);
        $articles->img_url1 = $selectedImage[0];
        $articles->img_url2 = $selectedImage[1];
        $articles->img_url3 = $selectedImage[2];
        $articles->source_url1 = $selectedSource[0];
        $articles->source_url2 = $selectedSource[1];
        $articles->source_url3 = $selectedSource[2];

        // dd($request);
        $articles->thame = $request->input('thame');
        // dd($articles->thame);
        $articles->nickname = $request->input('nickname');
        // dd($request->isSelectedImage);
        
        // dd($articles->img_url1);
        $articles->save();
    }

    public function show($id)
    {
        $articles = Article::where('id', $id)->get();
        // dd($articles);

        return $articles;
    }

    public function likes()
    {
    }
}
