<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomImageController;

// Route::view('/', 'welcome');

// Route::view('/', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth', 'verified'])
    ->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index')->name('dashboard');
            Route::put('/booking/{booking}', 'store')->name('booking.store');
        });

        Route::controller(RoomController::class)->group(function () {
            Route::get('/rooms', 'index')->name('rooms.index');
            Route::get('/rooms/create', 'create')->name('rooms.create');
            Route::post('/rooms', 'store')->name('rooms.store');
            Route::delete('/rooms/{room}', 'destroy')->name('rooms.destroy');
        });

        Route::controller(RoomImageController::class)->group(function(){
            Route::get('/roomimages', 'index')->name('roomImages.index');
            Route::get('/roomimages/create', 'create')->name('roomImages.create');
            Route::post('/roomimages', 'store')->name('roomImages.store');
            Route::delete('/roomimages/{roomImage}', 'destroy')->name('roomImages.destroy');
        });
    });
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
