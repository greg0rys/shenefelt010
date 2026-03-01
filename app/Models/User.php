<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Observers\UserObserver;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Action;
use Illuminate\Notifications\Notifiable;

#[ObservedBy([UserObserver::class])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
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
        'action_type',
        'user_id',
        'title',
        'body',
        'start_time',
        'end_time',
        'system_role',
        'company_id',
        'item_id',
        'inventory_id',
        'name',
        'is_admin',
        'remember_token',
        'email'
    ];
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'deleted_at',
    ];

    // roles as defined for users in the db. eloquent orm is not meant to handle these without the use of an enum.
    private array $roles = ['admin', 'user', 'vendor', 'contract employee'];

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

    public function items(): HasMany
    {
        return $this->hasMany(InventoryItem::class, 'user_id', 'id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function time_entry(): HasMany
    {
        return $this->hasMany(UserClockIn::class);
    }

    public function inventory_action(): HasMany
    {
        return $this->hasMany(InventoryActions::class, 'user_id', 'id');
    }


    public function isBlocked(): bool
    {
        return $this->ban !== null;
    }

    public function unblock(): bool
    {
        // the need for multi bans needs to be turned off
        return $this->ban()
            ->delete();
    }




}
