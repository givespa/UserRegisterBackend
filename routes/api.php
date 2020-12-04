<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//========================== API USER =====================
Route::group(['prefix' => 'users'], static function () {

    Route::get('/', [UserController::class, 'get'])->name('user.get.all');  // get user
    Route::get('/{id}', [UserController::class, 'get'])->name('user.get');  // get all users
    Route::post('/', [UserController::class, 'create'])->name('user.create'); // create register
    Route::put('/{id}', [UserController::class, 'update'])->name('user.update'); // update register
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.delete'); // delete register
});
