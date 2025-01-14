<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    protected function afterCreate(): void
    { 
        $student = $this->record; 
        $studentRole = Role::where('name', 'student')->first();
        if ($studentRole) {
            $student->assignRole($studentRole);
        }
    }
}
