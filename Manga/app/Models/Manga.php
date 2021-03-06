<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manga extends Model
{
    use HasFactory;

    protected $table = 'mangaes';

    public function keyword()
    {
        return $this->BelongsTo(Keyword::class);
    }
}
