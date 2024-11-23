<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\CityController;
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
Route::get('schools', [SchoolController::class, 'index'])->name('schools.index');

Route::get('/school/create', [SchoolController::class, 'create'])->name('schools.create');
Route::post('/school', [SchoolController::class, 'store'])->name('schools.store');
Route::get('/school/edit/{id}', [SchoolController::class, 'edit']);
Route::put('/school/update/{id}', [SchoolController::class, 'update']);
Route::get('/school/show/{id}', [SchoolController::class, 'show']);
Route::delete('/school/del/{id}', [SchoolController::class, 'destroy']);

//Routes for teacher Controller
//Route::resource('teachers', TeacherController::class);
Route::get('teachers', [TeacherController::class,'index'])->name('teachers.index');
Route::get('teachers/create', [TeacherController::class,'create'])->name('teachers.create');
Route::post('teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('teachers/update/{id}', [TeacherController::class, 'update'])->name('teachers.update');
Route::get('teachers/show/{id}', [TeacherController::class, 'show'])->name('teachers.show');
Route::delete('teachers/delete/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');


//Routes for city
Route::get('cities', [CityController::class,'index'])->name('cities.index');
Route::get('cities/create', [CityController::class,'create'])->name('cities.create');
Route::post('cities', [CityController::class,'store'])->name('cities.store');
Route::get('cities/{id}/edit', [CityController::class,'edit'])->name('cities.edit');
Route::put('cities/update/{id}', [CityController::class,'update'])->name('cities.update');
Route::get('cities/show/{id}', [CityController::class,'show'])->name('cities.show');
Route::delete('cities/delete/{id}', [CityController::class,'destroy'])->name('cities.destroy');

Route::get('cities/schoolInCityShow/{city_id}', [CityController::class,'schoolInCityShow'])->name('cities.schoolInCityShow');