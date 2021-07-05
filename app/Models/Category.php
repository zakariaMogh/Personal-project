<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }



    public function scopePostsCount($query): Builder
    {
        if (auth()->user()->is_admin)
        {
            return $query->withCount('posts');
        }
        return $query->withCount(['posts' => function ($q)
        {
            $q->where('user_id', auth()->id());
        }]);
    }
}
