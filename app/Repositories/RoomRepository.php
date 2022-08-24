<?php

namespace App\Repositories;

use App\Exceptions\RoomAlreadyBookedException;
use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

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

    public function getAvailable($start, $end, $limit, $skip = 0): Collection|array
    {
        return $this->model
            ->with('booking')
            ->whereDoesntHave('booking', function (Builder $builder) use ($start, $end) {
                return $builder
                    ->whereBetween('to', [$start, $end])
                    ->OrWhereBetween('from', [$start, $end]);
            })
            ->skip($skip)
            ->take($limit)
            ->get();

    }

    /**
     * @throws RoomAlreadyBookedException
     */
    public function bookRoom(int $id, $from, $to)
    {
        $room = $this->model->findOrFail($id)->load('booking');

        if ($room->isBooked($from, $to))
            throw new RoomAlreadyBookedException('room already booked');

        $room->book($from, $to);

        return $room;
    }
}
