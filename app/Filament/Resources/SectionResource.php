<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Filament\Resources\SectionResource\RelationManagers;
use App\Models\Section;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';




    public static function getLabel(): string
    {
        return __('filament.section');
    }
    
    public static function getPluralLabel(): string
    {
         return __('filament.sections');
     }

        public static function getModelLabel(): string
        {
            return __('filament.section');
        }
        
        public static function getPluralModelLabel(): string
          {
        return __('filament.sections');
            }



    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()  
                ->maxLength(50)   
                ->label(__('filament.name')),  
            
            Forms\Components\TextInput::make('num_of_student')
                ->numeric()  
                ->required()   
                ->minValue(1)  
                ->label(__('filament.num_of_student')),   
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('num_of_student'), 
             
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }


    public static function canViewAny(): bool
    {
        return auth()->user()->can('view sections');
    }
    
    public static function canCreate(): bool
    {
        return auth()->user()->can('create sections');
    }
    
    public static function canEdit($record): bool
    {
        return auth()->user()->can('edit sections');
    }
    
    public static function canDelete($record): bool
    {
        return auth()->user()->can('delete sections');
    }

}
