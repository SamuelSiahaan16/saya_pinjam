<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table; 
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Anggota';

    protected static ?string $navigationLabel = 'User';

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Pengguna')
                            ->required(), 
                        TextInput::make('username')
                            ->label('Username')
                            ->required(), 
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required(), 
                        TextInput::make('password')
                            ->label('Password')
                            ->revealable() 
                            ->dehydrateStateUsing(fn($state) => $state ? Hash::make($state) : null)
                            ->dehydrateStateUsing(fn($state, $record) => $state ? Hash::make($state) : $record->password)
                            ->required(fn($context) => $context === 'create')
                            ->password(),
                        Select::make('city_id') 
                            ->label('Nama Kota/Kabupaten')
                            ->relationship('city', 'name')
                            ->searchable(),
                        Select::make('roles_id')
                            ->label('Roles')
                            ->multiple()
                            ->relationship('roles', 'name')
                            ->preload(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Nama User'),
                TextColumn::make('username')
                    ->searchable()
                    ->label('Username'),
                TextColumn::make('role_names')
                    ->searchable()
                    ->label('Role'), 
                TextColumn::make('ksp_name')
                    ->searchable()
                    ->label('Nama KSP'),
                TextColumn::make('city.name')  
                    ->label('Tempat Anggota'), 
                TextColumn::make('email')  
                    ->label('Email Anggota'), 
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'), 
        ];
    }
}