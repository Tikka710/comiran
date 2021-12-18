<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $table = 'articles';
    use HasFactory;

    public function action(): BelongsToMany
    {
        return $this->belongsToMany('App\Action')->withTimestamps();
    }

    // public function likes(): BelongsToMany
    // {
    //     return $this->belongsToMany('App\Actio')
    // }
}
