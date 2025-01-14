<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')->required(),
                Forms\Components\TextInput::make('middle_name')->required(),
                Forms\Components\TextInput::make('last_name')->required(),
                Forms\Components\TextInput::make('mother_name')->required(),
                Forms\Components\TextInput::make('email')->label('Email address')->email()->required()->maxLength(255),
                Forms\Components\Select::make('courses')
                ->relationship('courses', 'course_name')  
                ->multiple()  
                ->label(__('Courses'))
                ->required(),
 
            Forms\Components\Select::make('section_id')
                ->relationship('section', 'name')  
                ->label(__('Section'))
                ->required(),                Forms\Components\TextInput::make('address'),
                Forms\Components\TextInput::make('national_id')->required(),
                Forms\Components\TextInput::make('college_name'),
                Forms\Components\TextInput::make('specialization'),
                Forms\Components\TextInput::make('overall_grade'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name'),
                Tables\Columns\TextColumn::make('middle_name'),
                Tables\Columns\TextColumn::make('last_name'),
                Tables\Columns\TextColumn::make('mother_name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('courses.course_name')
                ->label(__('Courses'))
                ->sortable()
                ->limit(50),
                Tables\Columns\TextColumn::make('section'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('national_id'),
                Tables\Columns\TextColumn::make('college_name'),
                Tables\Columns\TextColumn::make('specialization'),
                Tables\Columns\TextColumn::make('overall_grade'),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
