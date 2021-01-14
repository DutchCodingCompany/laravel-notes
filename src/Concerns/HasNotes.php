<?php

namespace DutchCodingCompany\Notes\Concerns;

use DutchCodingCompany\Notes\Models\Note;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait HasNotes
{
    /**
     * Get the notes that belong to the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notes(): MorphMany
    {
        return $this->morphMany(
            config('notes.model', Note::class),
            'notable'
        );
    }
}
