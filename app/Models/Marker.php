<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Marker extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'visibility',
        'slug',
        'name',
        'description',
        'lat',
        'long',
        'validated_at',
    ];

    protected $dates = [
        'validated_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function invitedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('visibility', 'public');
    }

    public function scopeMembers(Builder $query): Builder
    {
        return $query->where('visibility', 'members');
    }

    public function scopeValidated(Builder $query): Builder
    {
        return $query->whereNotNull('validated_at');
    }
}
