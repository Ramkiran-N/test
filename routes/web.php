<?php

use App\Http\Auth\AuthController;
use App\Http\Task\TaskController;
use Illuminate\Support\Facades\Route;


Route::any('/view-register', [AuthController::class, 'viewRegister'])->name('viewRegister');
Route::any('/register', [AuthController::class, 'register'])->name('register');
Route::any('/login', [AuthController::class, 'login'])->name('login');
Route::any('/logout', [AuthController::class, 'logout'])->name('logout');
Route::any('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::middleware(['auth'])->group(function () {
    Route::any('/',[TaskController::class,'index']);
    Route::any('store',[TaskController::class,'store']);
    Route::any('edit/{id}',[TaskController::class,'edit']);
    Route::any('update',[TaskController::class,'update']);
    Route::any('delete/{id}',[TaskController::class,'delete']);
});