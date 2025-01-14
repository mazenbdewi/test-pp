<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;

class StudentDashboard extends Page
{
    protected static string $resource = UserResource::class;

    //protected static string $view = 'filament.resources.user-resource.pages.student-dashboard';

    protected function canView(): bool
{
    return auth()->user()->hasRole('student');
}




 // protected static string $view = 'filament.pages.student-dashboard';

    protected static ?string $slug = 'student-dashboard';

    public $name;
    public $email;
    public $profile_picture;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->profile_picture = $user->profile_picture;
    }

    public function updateProfile()
    {
        $user = Auth::user();
        
        if ($this->profile_picture) {
            $path = $this->profile_picture->store('profile-pictures', 'public');
            $user->profile_picture = $path;
        }
        
        $user->save();

        session()->flash('success', 'تم تحديث الملف الشخصي بنجاح');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\SaveAction::make()->label('حفظ')->action('updateProfile'),
        ];
    }



}
