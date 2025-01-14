<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;

class TeacherDashboard extends Page
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.teacher-dashboard';
    protected function canView(): bool
{
    return auth()->user()->hasRole('teacher');
}

}
