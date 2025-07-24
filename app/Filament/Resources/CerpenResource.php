<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CerpenResource\Pages;
use App\Filament\Resources\CerpenResource\RelationManagers;
use App\Models\Cerpen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class CerpenResource extends Resource
{
    protected static ?string $model = Cerpen::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_name')
                    ->label('Username')
                    ->default(fn() => auth()->user()->name),
                Forms\Components\Hidden::make('user_id')
                    ->default(fn() => auth()->id()),
                Forms\Components\Textarea::make('judul')
                    ->label('Judul Cerpen')
                    ->required()->live(onBlur: true)
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state)))
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('slug')
                    ->readOnly()
                    ->required(),
                Forms\Components\Textarea::make('keterangan')
                    ->label('Isi Cerpen')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $is_super_admin = Auth::user()->hasRole("super_admin");

                if (!$is_super_admin) {
                    $query->where('user_id', Auth::user()->id);
                }
            })
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label("Username")
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('judul')
                    ->label("Judul Cerpen")
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->label("Isi Cerpen")
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->tooltip(fn($record) => $record->keterangan),
                Tables\Columns\TextColumn::make('views')
                    ->label('Dilihat')
                    ->sortable(),
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
                Tables\Actions\Action::make('buka')
                    ->label('Lihat')
                    ->icon('heroicon-m-eye')
                    ->action(function (Cerpen $record) {
                        $record->increment('views');
                        return redirect()->route('filament.admin.resources.cerpens.view', ['record' => $record]);
                    })
                    ->color('success'),

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
            'index' => Pages\ListCerpens::route('/'),
            'create' => Pages\CreateCerpen::route('/create'),
            'edit' => Pages\EditCerpen::route('/{record}/edit'),
            'view' => Pages\ViewCerpen::route('/{record}'),
        ];
    }
}
