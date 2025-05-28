<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GameResource\Pages;
use App\Filament\Resources\GameResource\RelationManagers;
use App\Models\Game;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Game')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('keterangan')
                    ->label('Deskripsi Game')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar'),
                Forms\Components\TextInput::make('kategori')
                    ->label('Kategori')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Game')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->label('Deskripsi Game')
                    ->limit(50)
                    ->tooltip(fn($record) => $record->keterangan)
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->square(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label("Dibuat")
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label("Diedit")
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }
}