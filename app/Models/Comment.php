<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'text',
        'user_id',
        'commentable_id',
        'commentable_type'
    ];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
        
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
