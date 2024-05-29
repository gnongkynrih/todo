<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::where('status','active')->get();
        return view('rooms.index', compact('rooms'));
    }
    public function create(){
        return view('rooms.create');
    }
    public function store(RoomRequest $request){
        $room = Room::create($request->validated());
        return redirect()->route('rooms.index');
    }
    public function destroy(Room $room){
        $room->status="inactive";
        $room->save();
        return redirect()->route('rooms.index');
    }

    public function getRoomCategory(){
        $rooms = Room::where('status','active')->get();
        $data = [];
        foreach($rooms as $room){
            $roomImage = RoomImage::where('room_id',$room->id)
            ->where('show_in_bookroom','yes')->first();
            $url  ='https://booking.yalanahotel.com/public/storage/images/' . $roomImage->image;
            $data[] = [
                'id' => $room->id,
                'name' => $room->name,
                'price' => $room->price,
                'image' => $url
            ];
        }
        return response()->json($data);}
}
