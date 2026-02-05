<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Action;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'password',
        'reason',
        'total_time_worked',
        'total_break_time',
        'action_type',
        'user_id',
        'title',
        'body',
        'start_time',
        'end_time',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function ban(): HasOne
    {
        return $this->hasOne(Ban::class);
    }

    public function actions(): HasMany
    {
        return $this->hasMany(UserAction::class, 'user_id', 'id');
    }

    function posts(): HasMany
    {
        return $this->hasMany(userPost::class, 'user_id', 'id');
    }


    public function generate_user_info(string $first_name = 'nan', string $last_name = 'given'): void
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->full_name = $first_name . ' ' . $last_name;
        $this->email = strtolower("{$this->first_name}@{$this->last_name}.org");
    }

    public function isBlocked(): bool
    {
        return $this->ban !== null;
    }

    public function time_entry(): HasMany
    {
        return $this->hasMany(UserClockIn::class);
    }
}
