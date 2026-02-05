<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class UserPost extends Model
{
    /** @use HasFactory<\Database\Factories\UserPostFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post){
            $post->slug = Str::slug($post->title);
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
