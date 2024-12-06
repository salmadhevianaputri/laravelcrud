<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KripeResource\Pages;
use App\Filament\Resources\KripeResource\RelationManagers;
use App\Models\Kripe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use App\Filament\Resources\KripeResource\Pages\ListKripes;


class KripeResource extends Resource
{
    protected static ?string $model = Kripe::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Field untuk Nama Produk
                Forms\Components\TextInput::make('name')
                    ->label('Nama Produk')
                    ->required() // Menandakan kolom ini wajib diisi
                    ->maxLength(255), // Batas panjang karakter
                
                // Field untuk Harga Produk
                Forms\Components\TextInput::make('price')
                    ->label('Harga')
                    ->required() // Menandakan kolom ini wajib diisi
                    ->numeric() // Menandakan input berupa angka
                    ->rules('min:0'), // Menetapkan aturan validasi harga minimal 0
                
                // Field untuk Jumlah Produk
                Forms\Components\TextInput::make('quantity')
                    ->label('Jumlah Produk')
                    ->required() // Menandakan kolom ini wajib diisi
                    ->numeric() // Input berupa angka
                    ->rules('min:1'), // Menetapkan aturan validasi jumlah minimal 1
                
                // Field untuk Gambar Produk
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar Produk')
                    ->image() // Menandakan hanya gambar yang bisa diunggah
                    ->directory('images/products') // Direktori penyimpanan gambar
                    ->nullable(), // Gambar tidak wajib
            ]);
    }
    

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Produk')
                    ->sortable()
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->sortable()
                    ->formatStateUsing(fn($state) => 'Rp. ' . number_format($state, 0, ',', '.')), // Format harga
    
                Tables\Columns\TextColumn::make('quantity')
                    ->label('Total Produk')
                    ->sortable()
                    ->formatStateUsing(fn($state) => $state . ' pcs'), // Format total produk
    
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public') // Menggunakan disk public
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->image)) // Menambahkan URL gambar
                    ->size(50), // Ukuran gambar (optional)
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Add relations if any
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKripes::route('/'),
            'create' => Pages\CreateKripe::route('/create'),
            'edit' => Pages\EditKripe::route('/{record}/edit'),
        ];
    }

    public static function getProducts()
    {
    return Kripe::all(); // Mengambil semua data dari tabel kripes
    }

}
