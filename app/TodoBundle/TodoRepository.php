<?php

namespace App\TodoBundle;

use App\Models\TodoItem;
use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TodoRepository
 * @package App\TodoBundle
 *
 * @author Fadi Ahmad <royalfadich@gmail.com>
 */
class TodoRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(
        TodoItem $todoItem
    ) {
        $this->model = $todoItem;
    }

    /**
     * Get the entity by identifier.
     *
     * @param string|integer $id
     *   Entity identifier.
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     *   Entity object.
     */
    public function get($id)
    {
        return $this->model->find($id);
    }

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
    public function find($conditions, $limit = null, $offset = null)
    {
        return $this->model
            ->limit($limit)
            ->offset($offset)
            ->where($conditions)
            ->get();
    }

    /**
     * Get all entities.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[] List of entities.
     * List of entities.
     */
    public function findAll()
    {
        return $this->model
            ->get();
    }

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
    public function save(array $attributes)
    {
        $date = date('Y-m-d H:i:s');

        $model = isset($attributes['id']) ? $this->get($attributes['id']) : new TodoItem($attributes);

        if (!$model) {
            return null;
        }

        $model->setAttribute('updated_at', $date);

        $status = $model->getAttribute('status');
        if (!is_int($status) && !is_string($status)) {
            $model->setAttribute('status', TodoItem::STATUS_ACTIVE);
        }


        if (!$model->exists) {
            $model->setAttribute('created_at', $date);
            if ($model->save()) {
                return $model;
            }
        }

        if ($model->update($attributes)) {
            return $model;
        }

        return null;
    }

    /**
     * Delete the entity.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *   Entity which has to be deleted.
     *
     * @return bool
     *   Result of deleting (success).
     */
    public function delete(Model $model)
    {
        return $model->setAttribute('status', TodoItem::STATUS_DELETED)->save();
    }

}
