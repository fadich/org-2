<?php

namespace App\Interfaces;

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
     * @return \App\Interfaces\EntityInterface|null
     *   Entity object.
     */
    public function get($id);

    /**
     * Get entities array by condition.
     *
     * @param array|string $condition
     *   Searching criteria.
     *
     * @return \App\Interfaces\EntityInterface[]
     *   List of entities.
     */
    public function find($condition);

    /**
     * Get all entities.
     *
     * @return \App\Interfaces\EntityInterface[]
     *   List of entities.
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
     * @param \App\Interfaces\EntityInterface $entity
     *   Updating entity.
     *
     * @return \App\Interfaces\EntityInterface
     *   Updating entity with updated (actual) data.
     */
    public function save(EntityInterface $entity);

    /**
     * Delete the entity.
     *
     * @param \App\Interfaces\EntityInterface $entity
     *   Entity which has to be deleted.
     *
     * @return bool
     *   Result of deleting (success).
     */
    public function delete(EntityInterface $entity);
}
