<?php

namespace App\Repositories;

use App\Models\RoomType;

/**
 * @method get()
 */
class RoomTypeRepository
{
    private RoomType $model;

    public function __construct(RoomType $roomType)
    {
        $this->model = $roomType;
    }

    public function __call(string $name, array $arguments)
    {
        return $this->model->$name(...$arguments);
    }
}
