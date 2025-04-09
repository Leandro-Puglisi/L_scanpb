<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Filament\Resources\MessageResource\RelationManagers;
use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action; // CORREGGI QUI

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        
        return $form;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('nome'),
            Tables\Columns\TextColumn::make('cognome'),
            Tables\Columns\TextColumn::make('email'),
            Tables\Columns\TextColumn::make('telefono'),
            Tables\Columns\TextColumn::make('messaggio'),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                // Aggiungi l'azione per visualizzare i dettagli del messaggio in una modale
                Action::make('view')
                    ->label('Visualizza')
                    ->modalHeading('Dettagli Messaggio')
                    ->modalSubheading(fn ($record) => 'Messaggio di ' . $record->nome . ' ' . $record->cognome)
                    ->modalContent(function ($record) {
                        return view('filament.resources.messages.view', [
                            'message' => $record,
                        ]);
                    })
                    ->icon('heroicon-o-eye'),
            
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
            'index' => Pages\ListMessages::route('/'),
            'create' => Pages\CreateMessage::route('/create'),
            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }
}
