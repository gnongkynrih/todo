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
}
