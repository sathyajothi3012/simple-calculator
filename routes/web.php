<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalculatorController;

use App\Http\Middleware\Authlogin;


Route::get('register',[UserController::class,'index'])->name('create');
Route::post('insert',[UserController::class,'insert'])->name('insert');
Route::middleware([Authlogin::class])->group(function () {

Route::get('edit/{datas}',[UserController::class,'edit'] )->name('edit');
Route::get('dashbord',[UserController::class,'dashbord'] )->name('index');

Route::put('update/{datas}',[UserController::class,'update'] )->name('update');
Route::delete('delete/{datas}',[UserController::class,'delete'] )->name('delete');
Route::any('view/{datas}',[UserController::class,'view'] )->name('view');
});
Route::get('login',[UserController::class,'login'] )->name('login');

Route::post('login_ck',[UserController::class,'login_ck'] )->name('login_ck');
Route::get('logout',[UserController::class,'logout'] )->name('logout');
Route::get('/', function () {
    return view('calculator');
});

Route::post('/calculate', [CalculatorController::class, 'calculate']);
