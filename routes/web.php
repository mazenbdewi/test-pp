<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Livewire\Post;
use App\Livewire\PostShow;
use Illuminate\Support\Facades\Route;

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

//Routes for School Controller
Route::get('schools', [SchoolController::class, 'index']);

Route::get('/school/create', [SchoolController::class, 'create']);
Route::post('/school', [SchoolController::class, 'store']);
Route::get('/school/edit/{id}', [SchoolController::class, 'edit']);
Route::put('/school/update/{id}', [SchoolController::class, 'update']);
Route::get('/school/show/{id}', [SchoolController::class, 'show']);
Route::delete('/school/del/{id}', [SchoolController::class, 'destroy']);
Route::resource('teachers', TeacherController::class);
