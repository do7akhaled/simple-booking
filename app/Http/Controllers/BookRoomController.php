<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRoomRequest;
use App\Repositories\RoomRepository;
use Illuminate\Http\Request;

class BookRoomController extends Controller
{
    private RoomRepository $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function __invoke(BookRoomRequest $request)
    {
        try {
            $this->roomRepository->bookRoom($request->get('room_id'), $request->get('from'), $request->get('to'));
        }catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }

        return response()->json(['message' => 'Booked Successfully']);
    }
}
