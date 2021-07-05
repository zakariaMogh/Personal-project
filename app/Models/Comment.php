<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Comment extends Pivot
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'content',
    ];

    public function scopeAuthUser($query): Builder
    {
        if (auth()->user()->is_admin)
        {
            return $query;
        }

        return $query->where('user_id', auth()->id())
            ->orWhereHas('post', function ($q)
            {
                $q->where('user_id', auth()->id());
            });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
