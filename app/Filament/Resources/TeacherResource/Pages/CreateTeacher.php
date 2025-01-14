<?php

namespace App\Filament\Resources\TeacherResource\Pages;

use App\Filament\Resources\TeacherResource;
use Filament\Actions;
use Spatie\Permission\Models\Role;
use Filament\Resources\Pages\CreateRecord;

class CreateTeacher extends CreateRecord
{
    protected static string $resource = TeacherResource::class;
  
  
    // protected function afterCreate(): void
    // { 
    //     $teacher = $this->record; 
    //     $teacherRole = Role::where('name', 'teacher')->first();
    //     if ($teacherRole) {
    //         $teacher->assignRole($teacherRole, ['guard_name' => 'web']);
    //     }
    // }
    
}
