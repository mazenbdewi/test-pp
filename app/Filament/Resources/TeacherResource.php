<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Filament\Resources\TeacherResource\RelationManagers;
use App\Models\Teacher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getLabel(): string
    {
        return __('filament.teacher');
    }
    
    public static function getPluralLabel(): string
    {
         return __('filament.teachers');
     }

        public static function getModelLabel(): string
        {
            return __('filament.teacher');
        }
        
        public static function getPluralModelLabel(): string
          {
        return __('filament.teachers');
            }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()   
                ->maxLength(20)   
                ->label(__('filament.name')),   
            
            Forms\Components\TextInput::make('age')
                ->numeric()   
                ->required()   
                ->minValue(0)   
                ->maxValue(80)   
                ->label(__('filament.age')),   
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label(__('filament.name')),
                Tables\Columns\TextColumn::make('age')->label(__('filament.age')),
                 
                         ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }


    public static function canViewAny(): bool
    {
        return auth()->user()->can('view teachers');
    }
    
    public static function canCreate(): bool
    {
        return auth()->user()->can('create teachers');
    }
    
    public static function canEdit($record): bool
    {
        return auth()->user()->can('edit teachers');
    }
    
    public static function canDelete($record): bool
    {
        return auth()->user()->can('delete teachers');
    }

}
