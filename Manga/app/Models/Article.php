<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    use HasFactory;

    public function thames()
    {
        return $this->belongsTo(Thame::class, 'thema_id');
    }

    public function mangaes()
    {
        return $this->belongsTo(Manga::class, 'manga_id');
    }
}
