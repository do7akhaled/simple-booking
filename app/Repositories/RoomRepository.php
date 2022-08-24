<?php

namespace App\Repositories;

use App\Models\Room;

class RoomRepository
{
    private Room $model;

    public function __construct(Room $room)
    {
        $this->model = $room;
    }

    public function __call(string $name, array $arguments)
    {
        return $this->model->$name(...$arguments);
    }
}
