<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session; 


class AppServiceProvider extends ServiceProvider
{ 
    public function register(): void
    {
         
    }

   
    public function boot(): void
    {


        $locale = Session::get('locale', config('filament.locale'));
        App::setLocale($locale);


        Gate::define('use-translation-manager', function (?User $user) {
            // Your authorization logic
            return $user;
        });

        Gate::define('delete-course', function (?User $user, Course $course) {
            return $user->id === $course->user_id;   
        });
        
    }
}
