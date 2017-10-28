<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RepositoryInterface
 * @package App\Interfaces
 *
 * Repository is a collection of data providers.
 *
 * @author Fadi Ahmad <royalfadich@gmail.com>
 */
interface RepositoryInterface
{
    /**
     * Get the entity by identifier.
     *
     * @param string|integer $id
     *   Entity identifier.
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     *   Entity object.
     */
    public function get($id);

    /**
     * Get entities array by condition.
     *
     * @param array|string $conditions
     *   Searching criteria.
     *
     * @param integer $limit
     * @param integer $offset
     *
     * @return \Illuminate\Database\Eloquent\Model[]
     *   List of entities.
     */
    public function find($conditions, $limit = null, $offset = null);

    /**
     * Get all entities.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[] List of entities.
     * List of entities.
     */
    public function findAll();

    /**
     * Create/update entity.
     *
     * For example:
     * ```php
     *  $ur = new UserRepository();
     *  $user1 = new User();
     *  $user2 = $ur->find(1); // Find user by id.
     *
     *  $user1->name = "Admin";
     *  // ...
     *  $user1->addFriend($user2);
     *  $user2->addFriend($user1);
     *
     *  //...
     *
     *  // Update the entities (also, create new user).
     *  $user1 = $ur->save($user1);
     *  $user2 = $ur->save($user2);
     * ```
     *
     * @param array $attributes
     *   Updating entity attributes.
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     *   Updating entity with updated (actual) data.
     */
    public function save(array $attributes);

    /**
     * Delete the entity.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *   Entity which has to be deleted.
     *
     * @return bool
     *   Result of deleting (success).
     */
    public function delete(Model $model);
}
