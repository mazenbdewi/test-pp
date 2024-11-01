<?php

use App\Livewire\Post;
use App\Livewire\PostShow;
use Illuminate\Support\Facades\Route;

Route::get('/post', Post::class);
Route::get('/Showpost', PostShow::class)->name('Showpost');
