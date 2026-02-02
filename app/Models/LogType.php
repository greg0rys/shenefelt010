<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LogType extends Model
{
    /** @use HasFactory<\Database\Factories\LogTypeFactory> */
    use HasFactory;

    protected $fillable = [
        'action_name',
    ];

    public function userActions(): HasMany
    {
        return $this->hasMany(UserAction::class);
    }
}
