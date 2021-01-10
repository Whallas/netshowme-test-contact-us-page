<?php

namespace App\Models\Contracts;

use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;
use Throwable;

/**
 * Model interface
 */
interface Model extends Arrayable, ArrayAccess, Jsonable, JsonSerializable
{
    /**
     * Get all of the current attributes on the model.
     *
     * @return array
     */
    public function getAttributes();

    /**
     * Fill the model with an array of attributes.
     *
     * @param array $attributes
     * @return $this
     *
     * @throws Throwable
     */
    public function fill(array $attributes);

    /**
     * Save the model to the database.
     *
     * @param array $options
     * @return bool
     */
    public function save(array $options = []);

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable();
}
