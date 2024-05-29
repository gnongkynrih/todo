<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/roomcategory','App\Http\Controllers\RoomController@getRoomCategory');
Route::post('/bookroom', 'App\Http\Controllers\BookingController@bookRoom');
Route::get('/getroomimages', 'App\Http\Controllers\RoomImageController@getRoomImages');
Route::get('/getroomimagesbyid/{room}', 'App\Http\Controllers\RoomImageController@getRoomImageByRoomId');
Route::get('/getroomtoshowbooking/{room}', 'App\Http\Controllers\RoomImageController@getRoomToShowBooking');
Route::get('/reviews/getreviews', 'App\Http\Controllers\ReviewController@getReviews');