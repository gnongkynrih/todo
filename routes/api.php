<?php

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

Route::get('/user', function (Request $request) {
    return new UserResource($request->user());
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function(){
    Route::post('/registration','register')->name('auth.register');
    Route::post('/login','login')->name('auth.login');
});
Route::controller(AuthController::class)->group(function(){
    Route::post('/logout','logout')->name('auth.logout');
})->middleware('auth:sanctum');

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
    return ['token' => $token->plainTextToken];
});

Route::controller(TodoController::class)->group(function(){
    Route::get('/','index')->name('todo.index');
    Route::post('/store','store')->name('todo.store');
    Route::get('/todo/{task}','edit')->name('todo.edit');
    Route::put('/todo/{task}','update')->name('todo.update');
    Route::delete('/todo/{task}','destroy')->name('todo.destroy');
});