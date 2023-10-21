<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\LogOutController;



Route::view('/', 'landing-page');


Route::controller(AdminRegisterController::class) -> group(function(){

	Route::get('page/admin/create', 'create') -> name('admin.register.create');

	Route::post('page/admin/store', 'store') -> name('admin.register.store');

});


Route::controller(AdminAccountController::class) -> group(function(){

	Route::get('login/admin', 'create') -> name('login.admim.create');

	Route::post('login/auth', 'login') -> name('login.admin.login');

});


Route::controller(LogOutController::class) -> group(function(){

	Route::post('user/logout', 'logout') -> name('lougout.user');

});