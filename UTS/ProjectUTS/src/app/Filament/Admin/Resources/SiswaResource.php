<?php

namespace App\Filament\Admin\Resources;

use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

// ✅ Import halaman Pages satu per satu (agar Intelephense gak merah)
use App\Filament\Admin\Resources\SiswaResource\Pages\ListSiswas;
use App\Filament\Admin\Resources\SiswaResource\Pages\CreateSiswa;
use App\Filament\Admin\Resources\SiswaResource\Pages\EditSiswa;

// Komponen Forms dan Tables
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Data Siswa';
    protected static ?string $pluralModelLabel = 'Siswa';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nisn')
                ->label('NISN')
                ->required()
                ->unique(ignoreRecord: true),

            TextInput::make('nama')
                ->label('Nama Lengkap')
                ->required(),

            TextInput::make('kelas')
                ->label('Kelas')
                ->required(),

            TextInput::make('jurusan')
                ->label('Jurusan')
                ->required(),

            Textarea::make('alamat')
                ->label('Alamat')
                ->required(),

            TextInput::make('no_hp')
                ->label('No. HP')
                ->tel()
                ->required(),

            Select::make('status')
                ->label('Status')
                ->options([
                    'Aktif' => 'Aktif',
                    'Lulus' => 'Lulus',
                    'DO' => 'Drop Out',
                    'Pindah' => 'Pindah',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('nisn')->label('NISN')->searchable(),
            TextColumn::make('nama')->label('Nama')->searchable()->sortable(),
            TextColumn::make('kelas')->label('Kelas'),
            TextColumn::make('jurusan')->label('Jurusan'),
            TextColumn::make('status')->label('Status')->badge(),
        ])
        ->filters([])
        ->actions([
            EditAction::make(),
        ])
        ->bulkActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSiswas::route('/'),
            'create' => CreateSiswa::route('/create'),
            'edit' => EditSiswa::route('/{record}/edit'),
        ];
    }
}
