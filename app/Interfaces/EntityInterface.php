<?php

namespace App\Interfaces;

/**
 * Interface ModelInterface
 * @package App\Interfaces
 *
 * Entity is a directly data-collection object.
 *
 * @property integer|string $id
 *
 * @author Fadi Ahmad <royalfadich@gmail.com>
 */
interface EntityInterface
{
    /**
     * Getter for the entity identifier.
     *
     * @return string|integer
     *   The identifier.
     */
    public function getId();

}
