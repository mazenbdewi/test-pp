<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;

class AdminDashboard extends Page
{
    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.admin-dashboard';

    protected static ?string $navigationIcon = 'heroicon-o-cog';

   // protected static string $view = 'filament.pages.admin-dashboard';

    protected static ?string $navigationLabel = 'Admin Dashboard';


    
    protected function canView(): bool
      {
    return auth()->user()->hasRole('admin');
      }


}
