<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Followable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Str;

class User extends Authenticatable implements Searchable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'is_public',
        'name',
        'surname',
        'email',
        'website',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_public' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute($value): string
    {
        return ucwords(Str::lower($value));
    }

    public function getSurnameAttribute($value): string
    {
        return Str::upper($value);
    }

    public function getFullNameAttribute(): string
    {
        return $this->name . ' ' . $this->surname;
    }

    public function needsToApproveFollowRequests(): bool
    {
        return (bool) !$this->is_public;
    }

    public function scopePublic($query, $public = true)
    {
        return $query->where('is_public', $public);
    }

    public function markers(): HasMany
    {
        return $this->hasMany(Marker::class);
    }

    public function isPublic(): bool
    {
        return (bool) $this->is_public;
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('profile', $this);

        return new SearchResult($this, $this->username, $url);
    }
}
