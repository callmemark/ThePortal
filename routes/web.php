<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\StudentRecordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnrollRecordController;

use App\Http\Middleware\UserMiddleWare;




Route::controller(UserAuthController::class) -> group(function(){

    Route::get('/', 'get') -> name('signin.form');

});


Route::controller(UserDataController::class) -> group(function(){

    Route::post('/create', 'create') -> name('user.create');
    Route::post('/login/user', 'signin') -> name('user.signin');
    Route::post('/user/{user_data}/update/email', 'updateEmail') -> name('user.update.email');
    Route::post('/user/{user_data}/update/password', 'updatePassword') -> name('user.update.password');

    Route::get('/user/lougout', 'logout') -> name('user.logout');
    Route::get('/create/account', 'signup') -> name('signup.form');
    Route::get('/dashboard', 'getdashboard') -> name('dashboard');

});


Route::controller(StudentRecordController::class) -> group(function(){

    Route::get('/studet/list', 'getAll') -> name('student.list') -> middleware('admin');
    Route::get('/student/{student}/edit', 'getedit') -> name('student.edit') -> middleware('admin');
    Route::get('/student/register/form', 'registerForm') -> name('student.register.form') -> middleware('admin');
    Route::get('/studen/grade', 'getGrade') -> name('student.grade');

    Route::post('/register/student', 'create') -> name('student.create') -> middleware('admin');
    Route::post('/student/{student}/update', 'edit') -> name('student.update') -> middleware('admin');
    Route::post('/student/{student}/delete', 'delete') -> name('student.delete') -> middleware('admin');
    Route::post('/student/{student}/{subjectid}/unenroll', 'unenroll') -> name('student.unenroll') -> middleware('admin');
    
});


Route::controller(SubjectController::class) -> group(function(){

    Route::get('/subjects', 'get') -> name('subject.form') -> middleware('admin');
    Route::get('subject/{subject}/edit', 'edit') -> name('subject.edit') -> middleware('admin');

    Route::post('/subjects/new', 'create') -> name('subject.create') -> middleware('admin');
    Route::post('/suject/{subject}/delete', 'delete') -> name('subject.delete') -> middleware('admin');
    Route::post('/subject/{subject}/update', 'update') -> name('subject.update') -> middleware('admin');
    
});


Route::controller(EnrollRecordController::class) -> group(function(){

    Route::post('/enrollment/create/{student}', 'create') -> name('enrollement.create') -> middleware('admin');

});