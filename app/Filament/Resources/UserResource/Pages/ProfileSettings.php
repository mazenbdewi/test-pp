<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\Page;
use Filament\Forms; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;

class ProfileSettings extends Page
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $resource = UserResource::class;

    protected static string $view = 'filament.resources.user-resource.pages.profile-settings';

 

    public $name;
    public $email;
    public $password;
    public $profile_picture;

    public function mount()
    {
        $user = Auth::user();
        $this->form->fill([
            'name' => $user->name,
            'email' => $user->email,
            'profile_picture' => $user->profile_picture,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('الاسم')
                ->required(),
            TextInput::make('email')
                ->label('البريد الإلكتروني')
                ->email()
                ->required(),
            FileUpload::make('profile_picture')
                ->label('الصورة الشخصية')
                ->directory('profile-pictures')  
                ->image()
                ->columnSpan(2),
            TextInput::make('password')
                ->password()
                ->label('كلمة المرور الجديدة')
                ->dehydrateStateUsing(fn ($state) => $state ? Hash::make($state) : null)
                ->minLength(8),
        ];

    }

    public function submit()
    {
        $user = Auth::user(); 
    
        if ($user instanceof User) {  
        
            $user->name = $this->name;
            $user->email = $this->email;
     
            if ($this->password) {
                $user->password = Hash::make($this->password);
            }
     
            if ($this->profile_picture) {
                $path = $this->profile_picture->store('profile-pictures', 'public');
                $user->profile_picture = $path;
            }
    
         
            $user->save();  
    
          
            Notification::make()
                ->title('تم تحديث البيانات بنجاح!')
                ->success()
                ->send();
        } else {
            Notification::make()
                ->title('حدث خطأ أثناء تحديث البيانات')
                ->danger()
                ->send();
        }
    }
    
    

    protected function getActions(): array
    {
        return [
            \Filament\Pages\Actions\Action::make('save')
                ->label('حفظ')
                ->action('submit'),
        ];
    }

 

   // protected static string $view = 'filament.pages.profile-settings';

}
