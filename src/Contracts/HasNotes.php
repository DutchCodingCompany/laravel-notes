<?php

namespace DutchCodingCompany\Notes\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface HasNotes
{
    /**
     * Get the notes that belong to the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notes(): MorphMany;
}
