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
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Actions\Action;


class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Game Information')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                // Kolom Kiri
                                Forms\Components\Group::make()
                                    ->schema([
                                        Forms\Components\FileUpload::make('image')
                                            ->label('Game Cover')
                                            ->image()
                                            ->required()
                                            ->directory('games/covers')
                                            ->visibility('public')
                                    ]),
                                // Kolom kanan
                                Forms\Components\Group::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Game Title')
                                            ->placeholder('Zenless Zone Zero')
                                            ->required()->live(onBlur: true)
                                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state)))
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('creator')
                                            ->label('Post By')
                                            ->placeholder('Aruna')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Textarea::make('keterangan')
                                            ->label('Game Description')
                                            ->required()
                                            ->placeholder('Jelaskan fitur, gameplay, atau storyline game ini...')
                                            ->rows(5),
                                        Forms\Components\Repeater::make('kategori')
                                            ->label('Game Kategori (Multiple)')
                                            ->schema([
                                                Forms\Components\Textarea::make('kategori')
                                                    ->label('kategori')
                                                    ->placeholder('Tulis kategori game...')
                                                    ->rows(3)
                                                    ->extraInputAttributes(['onInput' => 'this.value = this.value.toUpperCase()'])
                                                    ->required(),
                                            ])
                                            ->defaultItems(1)
                                            ->minItems(1)
                                            ->maxItems(20)
                                            ->addActionLabel('Tambah Kategori')
                                            ->columnSpanFull()
                                            ->default([['kategori' => '']])
                                            ->required()

                                    ]),
                            ])
                    ]),
                // SECTION: Gambar Screenshot
                Forms\Components\Section::make('Preview Game')
                    ->schema([
                        Forms\Components\FileUpload::make('img_ss')
                            ->label('Screenshot image')
                            ->multiple()
                            ->maxFiles(3)
                            ->required()
                            ->image()
                            ->directory('games/preview')
                            ->visibility('public')
                            ->reorderable()
                    ]),
                // SECTION: Link & YouTube Preview
                Forms\Components\Section::make('Video Preview And Download')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Group::make()
                                    ->schema([
                                        Forms\Components\Placeholder::make('youtube_preview')
                                            ->label('YouTube Preview')
                                            ->content(function ($state, $get) {
                                                $url = $get('link_youtube');

                                                if (preg_match('/(?:v=|be\/|embed\/)([a-zA-Z0-9_-]{11})/', $url, $matches)) {
                                                    $videoId = $matches[1];
                                                    return new \Illuminate\Support\HtmlString("
                            <iframe width='100%' height='300' src='https://www.youtube.com/embed/{$videoId}'
                            frameborder='0' allowfullscreen class='rounded-lg shadow-md'></iframe>
                        ");
                                                }

                                                return 'Masukkan link YouTube untuk melihat preview.';
                                            })
                                            ->visible(fn($get) => filled($get('link_youtube')))
                                            ->columnSpanFull(),
                                        Forms\Components\TextInput::make('link_youtube')
                                            ->label('YouTube Link')
                                            ->required()
                                            ->placeholder('Tempelkan URL video YouTube di sini')
                                            ->reactive(),
                                    ]),
                                Forms\Components\Group::make()
                                    ->schema([
                                        Forms\Components\Placeholder::make('preview_download')
                                            ->label('Preview File Download')
                                            ->visible(fn($get) => filled($get('link_download')))
                                            ->content(function ($get) {
                                                $link = $get('link_download');

                                                // Cek apakah link berasal dari Google Drive
                                                if (preg_match('/drive\.google\.com\/file\/d\/([a-zA-Z0-9_-]+)/', $link, $matches)) {
                                                    $fileId = $matches[1];
                                                    $embedUrl = "https://drive.google.com/file/d/{$fileId}/preview";
                                                    return new \Illuminate\Support\HtmlString("
                <iframe src='{$embedUrl}' width='100%' height='300' frameborder='0' allow='autoplay'></iframe>
            ");
                                                }

                                                // Bisa tambahkan kondisi untuk jenis link lain
                                                return 'Preview tidak tersedia untuk link ini.';
                                            })
                                            ->columnSpanFull(),
                                        Forms\Components\TextInput::make('link_download')
                                            ->label('Link Download')
                                            ->required()
                                            ->placeholder('Tempelkan link Google Drive atau direct download')
                                            ->reactive(), // Penting agar bisa dideteksi oleh Placeholder di bawah

                                    ])
                            ])
                    ]),
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
                    ->action(function (Game $record) {
                        $record->increment('views');
                        return redirect()->route('filament.admin.resources.games.view', ['record' => $record]);
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
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
            'view' => Pages\ViewGame::route('/{record}'),
        ];
    }
}
