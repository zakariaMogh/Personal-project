<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'title',
        'cover',
        'slug'
    ];


    public function getImgUrlAttribute()
    {
        return $this->cover ? 'storage/'.$this->cover : 'assets/front/images/default-post.png';
    }

    public function scopeAuthUser($query): Builder
    {
        return auth()->user()->is_admin ? $query : $query->where('user_id', auth()->id());
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'comments')->using(Comment::class)->withPivot(['content', 'id']);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->with('user');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
