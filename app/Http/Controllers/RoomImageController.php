<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use App\Http\Resources\AllRoomImages;
use App\Http\Requests\StoreRoomImageRequest;

class RoomImageController extends Controller
{
    public function index(){
        $images = RoomImage::paginate(10);
        return view('roomimages.index', compact( 'images'));
    }
    public function create(){
        $rooms = Room::all();
        return view('roomimages.create', compact('rooms'));
    }
    public function store(StoreRoomImageRequest $request){
        if($request->hasFile('image')){
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $filename);
        }
        $rimage = new RoomImage();
        $rimage->room_id = $request->room_id;
        $rimage->show_in_bookroom = $request->show_in_bookroom;
        $rimage->image = $filename;
        $rimage->alt_text = $request->alt_text;
        $rimage->title = $request->title;
        $rimage->save();
        return redirect()->route('roomImages.index')->with('success', 'Room Image Created Successfully');
    }
    public function destroy(RoomImage $roomImage){
        //remove im age from storage
        $image_path = asset('storage/images/' . $roomImage->image);
        
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $roomImage->delete();
        return redirect()->route('roomImages.index')->with('success', 'Room Image Deleted Successfully');
    }

    public function getRoomImages(){
        $roomImages =AllRoomImages::collection(RoomImage::all());
        return response()->json($roomImages);
    }
    public function getRoomImageByRoomId(Room $room){
        $roomImages = AllRoomImages::collection($room->roomImages);
        return response()->json($roomImages);
    }
}
