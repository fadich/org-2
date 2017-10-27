<?php

namespace App\Models;

use App\Base\Object;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TodoItem
 * @package App\Models
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $status
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @author Fadi Ahmad <royalfadich@gmail.com>
 */
class TodoItem extends Model
{
    use Object {
        __set as public oSet;
        __get as public oGet;
    }

    const STATUS_ACTIVE = 4;
    const STATUS_POSTPONED = 3;
    const STATUS_DONE = 2;
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_DELETED = 0;

    /**
     * The database table name
     *
     * @var string
     */
    protected $table = 'todo_item';

    protected $attributes = [
        'title' => '',
        'content' => '',
        'status' => 4, // static::STATUS_ACTIVE
        'user_id' => null,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'status',
        'user_id',
    ];

    /**
     * Getter for the entity identifier.
     *
     * @return string|integer
     *   The identifier.
     */
    public function getId()
    {
        return $this->getKey();
    }

    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->setAttribute($name, $value);
        }

        return $this->oSet($name, $value);
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->getAttribute($name);
        }

        return $this->oGet($name);
    }

}
