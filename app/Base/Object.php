<?php

namespace App\Base;

/**
 * Trait Object
 * @package App\Base
 *
 * @author Fadi Ahmad <royalfadich@gmail.com>
 */
trait Object
{
    public function __get($name)
    {
        $getter = "get{$name}";
        if ($this->hasMethod($getter)) {
            return $this->$getter();
        } elseif ($this->hasMethod("set{$name}")) {
            throw new \Exception(static::class . '::$' . $name . ' is write-only property');
        } else {
            throw new \Exception(static::class . '::$' . $name . ' property does not exists');
        }
    }

    public function __set($name, $value)
    {
        $setter = "set{$name}";
        if ($this->hasMethod($setter)) {
            return $this->$setter($value);
        } elseif ($this->hasMethod("get{$name}")) {
            throw new \Exception(static::class . '::$' . $name . ' is read-only property');
        } else {
            throw new \Exception(static::class . '::$' . $name . ' property does not exists');
        }
    }

    public function hasMethod(string $name)
    {
        return method_exists($this, $name);
    }

}
