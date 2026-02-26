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
        'action_name',
        'action_success',
        'item_id',
        'action',
        'ip_address',
        'created_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function logType(): BelongsTo
    {
		// this
        return $this->belongsTo(LogType::class, 'action_type', 'id');
    }


}
