<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

#ObservedBy([UserPostObserver::class])
class UserPost extends Model
{
    /** @use HasFactory<\Database\Factories\UserPostFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'slug',
        'post_id',
    ];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function slug(): HasOne
    {
        return $this->hasOne(PostSlug::class, 'post_id', 'id');
    }

    public function updateSlug()
    {
        $this->slug()->update(['slug' => Str::slug($this->title, '-')]);
    }
}
