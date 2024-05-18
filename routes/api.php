<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/bookroom', 'App\Http\Controllers\BookingController@bookRoom');
Route::get('/getroomimages', 'App\Http\Controllers\RoomImageController@getRoomImages');
Route::get('/getroomimagesbyid/{room}', 'App\Http\Controllers\RoomImageController@getRoomImageByRoomId');