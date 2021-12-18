<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Action extends Model
{
    protected $table = 'like';
    use HasFactory;

    public function article(): BelongsToMany
    {
        return $this->belongsToMany('App\Like')->withTimestamps();
    }
}
