<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Manga;
use App\Models\Username;

class Manga extends Model
{
    use HasFactory;

    protected $table = 'mangas';

    public function thema(): BelongsTo
    {
        return $this->belongsTo(Manga::class, 'thema_id');
    }

    public function username(): BelongsTo
    {
        return $this->belongsTo(Username::class, 'username_id');
    }
}
