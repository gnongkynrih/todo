<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Mail\BookingMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\BookRoomRequest;

class BookingController extends Controller
{
    public function bookRoom(BookRoomRequest $request){
        try{
            $request->arrival =Carbon::parse($request->arrival)->format('Y-m-d');
            $request->departure = Carbon::parse($request->departure)->format('Y-m-d');
            $booking = Booking::create([
                'name' => $request->name,
                'email' => $request->email,
                'roomType' => $request->roomType,
                'mobile' => $request->mobile,
                'arrival' => $request->arrival,
                'departure' => $request->departure,
                'adultCount' => $request->adultCount,
                'childrenCount' => $request->childrenCount,
                'roomCount' => $request->roomCount,
            ]);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'room' => $request->room,
                'mobile' => $request->mobile,
                'roomcount' => $request->roomcount,
                'checkin' => $request->checkin,
                'checkout' => $request->checkout,
            ];
            Mail::to($request->email)->send(new BookingMailable($data));

            return response()->json(['message' => 'success'], 200);
        }catch(\Exception $e){
            return response()->json(['message' => $e], 500);
        }
    }
}
