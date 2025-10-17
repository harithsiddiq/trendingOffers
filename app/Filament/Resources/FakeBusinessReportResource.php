<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FakeBusinessReportResource\Pages;
use App\Models\FakeBusinessReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FakeBusinessReportResource extends Resource
{
    protected static ?string $model = FakeBusinessReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    protected static ?string $modelLabel = 'Fake Business Report';

    public static function getModelLabel(): string
    {
        return __('Fake Business Report');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Fake Business Reports');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label(__('Reported By'))
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->disabled(),
                Forms\Components\Select::make('store_id')
                    ->label(__('Reported Store'))
                    ->relationship('store', 'name')
                    ->searchable()
                    ->preload()
                    ->disabled(),
                Forms\Components\Textarea::make('reason')
                    ->label(__('Reason'))
                    ->columnSpanFull()
                    ->rows(6)
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('Reported By'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('store.name')
                    ->label(__('Reported Store'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('reason')
                    ->label(__('Reason'))
                    ->limit(60)
                    ->tooltip(fn ($record) => $record->reason)
                    ->wrap(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Reported At'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // No filters for now
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Read-only: no bulk actions
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFakeBusinessReports::route('/'),
            'view' => Pages\ViewFakeBusinessReport::route('/{record}'),
        ];
    }
}