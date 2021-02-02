<?php

namespace DutchCodingCompany\Notes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Note extends Model
{
    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'system' => false,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'notable_id',
        'notable_type',
        'text',
        'user_id',
        'system',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'system' => 'bool',
        'created_at' => 'datetime',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'user',
    ];

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable(): string
    {
        return config('notes.table', 'notes');
    }

    /**
     * Get the notable that belongs to the note.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function notable(): MorphTo
    {
        return $this->morphTo('notable');
    }

    /**
     * Get the user that belongs to the note.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        $provider = config(
            'auth.guards.' . config('auth.defaults.guard') . '.provider',
            'users'
        );

        $class = config('auth.providers.' . $provider . '.model');

        return $this->belongsTo($class);
    }
}
