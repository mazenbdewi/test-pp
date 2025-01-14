<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getLabel(): string
    {
        return __('filament.user');
    }
    
    public static function getPluralLabel(): string
    {
         return __('filament.users');
     }

        public static function getModelLabel(): string
        {
            return __('filament.user');
        }
        
        public static function getPluralModelLabel(): string
          {
        return __('filament.users');
            }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label(__('filament.name')),
                    Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->label(__('filament.email')),
                    
               
                    Forms\Components\FileUpload::make('profile_picture')
                    ->image()
                    ->directory('profile-pictures/photos')   
                    ->label(__('filament.picture')),
                
                    Forms\Components\TextInput::make('password')
                    ->password()
                    ->label(__('filament.password'))
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->required(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label(__('filament.name')),
                Tables\Columns\TextColumn::make('email')->label(__('filament.email')),
               
                Tables\Columns\ImageColumn::make('profile_picture')
                ->label('Photo')
                ->getStateUsing(fn($record) => url('storage/' . $record->profile_picture)) 
                ->disk('public')  
                ->width(70)       
                ->height(70),    
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
 
    public static function getRelations(): array
    {
        return [
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
