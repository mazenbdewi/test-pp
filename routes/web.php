<?php

use App\Livewire\Post;
use App\Livewire\PostShow;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;


//Route::get('/post', Post::class);
//Route::get('/Showpost', PostShow::class)->name('Showpost');
Route::get('/', function () {
    return view('welcome');  
});


Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);

