<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        if($request->bookingstatus == null){
            $bookings = Booking::where('status','pending')->orderBy('arrival','desc')->paginate(10);
        }else{
            $bookings = Booking::where('status',$request->bookingstatus)->orderBy('arrival','desc')->paginate(10);
        }
        return view('dashboard',compact('bookings'));
    }
    public function store(Booking $booking,Request $request){
        try{
            $booking->status = $request->status;
            $booking->save();
            return response()->json([
                'message' => 'Booking status updated successfully'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'An error occurred while updating booking status'
            ],500);
        }
    }
}
