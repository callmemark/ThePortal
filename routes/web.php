<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\AdminAccountController;

use App\Http\Controllers\StudentRegisterController;
use App\Http\Controllers\StudentAccountController;

use App\Http\Controllers\InstructorRegisterController;
use App\Http\Controllers\InstructorAccountController;

use App\Http\Controllers\LogOutController;



Route::view('/', 'landing-page');
Route::view('student/manage/menu', 'pages/panel_menu/student_manager_menu') -> name('panel.menu.student.menu');



Route::controller(AdminRegisterController::class) -> group(function(){

	Route::get('page/admin/create', 'create') -> name('admin.register.create');

	Route::post('page/admin/store', 'store') -> name('admin.register.store');

});


Route::controller(AdminAccountController::class) -> group(function(){
	Route::view('admin/pages/dashboard', 'pages/dashboards/admin_dashboard') -> name('dashboard');

	Route::get('login/admin', 'create') -> name('login.admim.create');

	Route::post('login/auth', 'login') -> name('login.admin.login');

});



Route::controller(StudentRegisterController::class) -> group(function(){

	Route::get('student/register/create', 'create') -> name('student.register.create');

	Route::post('student/store', 'store') -> name('student.register.store');

});

Route::controller(StudentAccountController::class) -> group(function(){

	Route::get('student/login/create', 'create') -> name('student.login.create');

	Route::post('student/login/auth', 'login') -> name('student.login.auth');

});


Route::controller(InstructorRegisterController::class) -> group(function(){

	Route::get('instructor/register/create', 'create') -> name('instructor.register.create');

	Route::post('instructor/register/store', 'store') -> name('instructor.register.store');

});


Route::controller(InstructorAccountController::class) -> group(function(){

	Route::get('instructor/login/create', 'create') -> name('instructor.login.create');

	Route::post('instructor/login/auth', 'login') -> name('instructor.login.auth');

});


Route::controller(LogOutController::class) -> group(function(){

	Route::post('user/logout/{role}', 'logout') -> name('lougout.user');

});
