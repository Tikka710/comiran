<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Article;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manga extends Model
{
    use HasFactory;

    protected $table = 'mangaes';

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
