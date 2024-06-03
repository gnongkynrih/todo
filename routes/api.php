<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(TodoController::class)->group(function(){
    Route::get('/','index')->name('todo.index');
    Route::post('/store','store')->name('todo.store');
    Route::get('/todo/{task}','edit')->name('todo.edit');
    Route::put('/todo/{task}','update')->name('todo.update');
    Route::delete('/todo/{task}','destroy')->name('todo.destroy');
});