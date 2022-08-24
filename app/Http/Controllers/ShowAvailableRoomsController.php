<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Repositories\RoomRepository;
use Illuminate\Http\Request;

class ShowAvailableRoomsController extends Controller
{
    private RoomRepository $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function __invoke(Request $request)
    {
        $start = $request->get('start') ?? today();
        $end = $request->get('end') ?? today();
        $take = $request->get('take') ?? 1000;
        $skip = $request->get('skip') ?? 0;


        $rooms =  $this->roomRepository->getAvailable($start, $end, $take, $skip);

        return response()->json(['data' => RoomResource::collection($rooms)]);
    }
}
