<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\DivisionController;
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
Route::get('/students/addtodivision/{id}', [StudentController::class, 'addToDivision'])->name('students.addtodivision');
Route::put('students/division/{id}', [StudentController::class, 'commit'])->name('students.commit');

//Routes for School Controller
Route::get('schools', [SchoolController::class, 'index'])->name('schools.index');

Route::get('/school/create', [SchoolController::class, 'create']);
Route::post('/school', [SchoolController::class, 'store']);
Route::get('/school/edit/{id}', [SchoolController::class, 'edit']);
Route::put('/school/update/{id}', [SchoolController::class, 'update']);
Route::get('/school/show/{id}', [SchoolController::class, 'show']);
Route::delete('/school/del/{id}', [SchoolController::class, 'destroy']);
Route::resource('teachers', TeacherController::class);
Route::get('/student/create/school/{id}', [StudentController::class, 'createStudent']);



//Routes for Division Controller
Route::get('/schools/divisions', [DivisionController::class, 'index'])->name('divisions.index');
Route::get('/school/view/students/{id}', [SchoolController::class, 'viewStudents']);
Route::get('/school/division/view/{id}', [DivisionController::class, 'view'])->name('divisions.view');

Route::get('/school/division/create', [DivisionController::class, 'create'])->name('divisions.create');
Route::get('/school/division/show/{id}', [DivisionController::class, 'show'])->name('divisions.show');

Route::get('/school/division/add/{id}', [DivisionController::class, 'add'])->name('divisions.add');
Route::post('/school/division', [DivisionController::class, 'store'])->name('divisions.store');
Route::get('/school/division/edit/{id}', [DivisionController::class, 'edit'])->name('divisions.edit');
Route::put('/school/division/update/{id}', [DivisionController::class, 'update'])->name('divisions.update');
Route::delete('/school/division/del/{id}', [DivisionController::class, 'destroy'])->name('divisions.destroy');


