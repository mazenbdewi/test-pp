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

Route::get('students', [StudentController::class, 'index'])->name('students.index');
Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('students', [StudentController::class, 'store'])->name('students.store');
Route::get('students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit'); 
Route::put('students/{id}', [StudentController::class, 'update'])->name('students.update'); 
Route::delete('students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');



//Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);

