<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thema;

class ThemaController extends Controller
{
    public function index()
    {
        $themas = Thema::all()->sortByDesc('created_at');
        return $themas;
    }

    public function store()
    {
    }
}
