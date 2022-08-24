<?php

namespace App\Repositories;

use App\Models\bookingReference;

class BookingReferenceRepository
{
    private bookingReference $model;

    public function __construct(bookingReference $bookingReference)
    {
        $this->model = $bookingReference;
    }


    public function __call(string $name, array $arguments)
    {
        return $this->model->$name(...$arguments);
    }
}
