<?php

namespace App\Filament\Admin\Resources;

use App\Models\Absensi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use App\Filament\Admin\Resources\AbsensiResource\Pages\ListAbsensis;
use App\Filament\Admin\Resources\AbsensiResource\Pages\CreateAbsensi;
use App\Filament\Admin\Resources\AbsensiResource\Pages\EditAbsensi;

class AbsensiResource extends Resource
{
    protected static ?string $model = Absensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Data Absensi';
    protected static ?string $pluralModelLabel = 'Absensi';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('siswa_id')
                ->label('Nama Siswa')
                ->relationship('siswa', 'nama')
                ->searchable()
                ->preload()
                ->required(),

            Forms\Components\DatePicker::make('tanggal')
                ->label('Tanggal')
                ->required(),

            Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'Hadir' => 'Hadir',
                    'Izin' => 'Izin',
                    'Sakit' => 'Sakit',
                    'Alpha' => 'Alpha',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('siswa.nama')->label('Nama Siswa'),
            Tables\Columns\TextColumn::make('tanggal')->label('Tanggal')->date(),
            Tables\Columns\TextColumn::make('status')->label('Status')->badge(),
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
            'index' => ListAbsensis::route('/'),
            'create' => CreateAbsensi::route('/create'),
            'edit' => EditAbsensi::route('/{record}/edit'),
        ];
    }
}
