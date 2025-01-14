<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;


class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // public function mount()
    // { 
    //        $user = Auth::user();
    //      if (!auth()->user()->can('view courses')) {
    //         abort(403, 'Unauthorized');
    //     }
    // }
    //protected static ?string $label =  "المادة";
  //  protected static ?string $pluralLabel = 'المواد';
  //  protected static ?string $modelLabel = 'مادة';
  //  protected static ?string $pluralModelLabel = 'المواد';
   // protected static ?string $navigationLabel = 'إدارة المواد';

    public static function getLabel(): string
    {
        return __('filament.course');
    }
    
    public static function getPluralLabel(): string
    {
         return __('filament.courses');
     }

        public static function getModelLabel(): string
        {
            return __('filament.course');
        }
        
        public static function getPluralModelLabel(): string
          {
        return __('filament.courses');
            }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make(__('course_name'))->required()->maxLength(20),
     
            Forms\Components\Select::make('section_id')
            ->relationship('section', 'name')
            ->label(__('filament.section'))
            ->required()
            ->maxLength(255)
            ->rules([
                'required',
                'string',
                'max:255',
            ])
            ->helperText(__('Course name must be a string and is required.')),
        
            Forms\Components\Select::make('teacher_id')
            ->relationship('teacher', 'name')
            ->label(__('filament.teacher'))
            ->required(),
            
        
             Forms\Components\DatePicker::make('year')
             ->required()
             ->label(__('filament.year')) 
             ->required()
             ->format('Y-m-d')
             ->reactive(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('course_name')->label(__('filament.course_name')),
                Tables\Columns\TextColumn::make('section.name')->label(__('filament.section')),
                Tables\Columns\TextColumn::make('teacher.name')->label(__('filament.teacher')),
                Tables\Columns\TextColumn::make('year')->label(__('filament.year')),

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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }

public static function canViewAny(): bool
{
    return auth()->user()->can('view courses');
}

public static function canCreate(): bool
{
    return auth()->user()->can('create courses');
}

public static function canEdit($record): bool
{
    return auth()->user()->can('edit courses');
}

public static function canDelete($record): bool
{
    return auth()->user()->can('delete courses');
}

}
