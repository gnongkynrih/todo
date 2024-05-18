<?php

namespace App\Http\Controllers;

use App\Models\Room;
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
}
