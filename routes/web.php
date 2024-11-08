<?php

use App\Livewire\Post;
use App\Livewire\PostShow;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

//Route::get('/post', Post::class);
//Route::get('/Showpost', PostShow::class)->name('Showpost');
Route::get('/', function () {
    return view('welcome');  
});


Route::resource('students', StudentController::class);



//Routes for School Controller
Route::get('schools',[SchoolController::class,'index']);


Route::get('/school/create',[SchoolController::class,'create']);
Route::post('/school',[SchoolController::class,'store']);
Route::get('/school/edit/{id}',[SchoolController::class,'edit']);
Route::put('/school/update/{id}',[SchoolController::class,'update']);
Route::get('/school/show/{id}',[SchoolController::class,'show']);
Route::delete('/school/del/{id}',[SchoolController::class,'destroy']);
