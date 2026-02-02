<?php

namespace App\Models;

use Database\Factories\UserActionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAction extends Model
{
    /** @use HasFactory<UserActionFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'action_type',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function logType(): BelongsTo
    {
        return $this->belongsTo(LogType::class, 'action_type', 'id');
    }
}
