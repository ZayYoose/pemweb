<?php

namespace App\Filament\Admin\Resources;

use App\Models\Nilai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use App\Filament\Admin\Resources\NilaiResource\Pages\ListNilais;
use App\Filament\Admin\Resources\NilaiResource\Pages\CreateNilai;
use App\Filament\Admin\Resources\NilaiResource\Pages\EditNilai;

class NilaiResource extends Resource
{
    protected static ?string $model = Nilai::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Data Nilai';
    protected static ?string $pluralModelLabel = 'Nilai';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('siswa_id')
                ->label('Siswa')
                ->relationship('siswa', 'nama')
                ->preload() // ✅ tampilkan langsung semua siswa (tanpa search box)
                ->required(),

            Forms\Components\TextInput::make('mapel')
                ->label('Mata Pelajaran')
                ->required(),

            Forms\Components\TextInput::make('semester')
                ->label('Semester')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('nilai')
                ->label('Nilai')
                ->numeric()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('siswa.nama')->label('Nama Siswa'),
            Tables\Columns\TextColumn::make('mapel')->label('Mapel'),
            Tables\Columns\TextColumn::make('semester'),
            Tables\Columns\TextColumn::make('nilai'),
        ])
        ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNilais::route('/'),
            'create' => CreateNilai::route('/create'),
            'edit' => EditNilai::route('/{record}/edit'),
        ];
    }
}
