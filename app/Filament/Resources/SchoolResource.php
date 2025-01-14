<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchoolResource\Pages;
use App\Filament\Resources\SchoolResource\RelationManagers;
use App\Models\School;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SchoolResource extends Resource
{
    protected static ?string $model = School::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(20),
             
            Forms\Components\Select::make('type')
                ->options([
                    'primary' => 'Primary',
                    'middle' => 'Middle',
                    'secondary' => 'Secondary',
                ])
                ->required()
                ->label('School Type'),

            Forms\Components\TextInput::make('rooms_num')
                ->numeric()
                ->required()
                ->label('Number of Rooms'),

            Forms\Components\TextInput::make('capacity')
                ->numeric()
                ->required()
                ->label('Capacity'),

            Forms\Components\Textarea::make('address')
                ->required()
                ->label('Address'),

            Forms\Components\FileUpload::make('photo')
                ->image()
                ->directory('schools/photos')
                ->label('Photo'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('School Name'),
            
            // Tables\Columns\TextColumn::make('type')
            //     ->label('Type')
            //     ->enum([
            //         'primary' => 'Primary',
            //         'middle' => 'Middle',
            //         'secondary' => 'Secondary',
            //     ]),
            Tables\Columns\TextColumn::make('type')
            ->label('Type')
            ->getStateUsing(function ($record) {
                 $types = [
                    'primary' => 'Primary',
                    'middle' => 'Middle',
                    'secondary' => 'Secondary',
                ];

                return $types[$record->type] ?? $record->type;   
            }),

            Tables\Columns\TextColumn::make('rooms_num')
                ->label('Number of Rooms'),

            Tables\Columns\TextColumn::make('capacity')
                ->label('Capacity'),

            Tables\Columns\TextColumn::make('address')
                ->label('Address')
                ->limit(50),  

                Tables\Columns\ImageColumn::make('photo')
                ->label('Photo')
                ->getStateUsing(fn($record) => url('storage/' . $record->photo)) 
                ->disk('public')  
                ->width(70)       
                ->height(70),    
       

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
            'index' => Pages\ListSchools::route('/'),
            'create' => Pages\CreateSchool::route('/create'),
            'edit' => Pages\EditSchool::route('/{record}/edit'),
        ];
    }
}
