<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold')
                    ->limit(40),
                TextColumn::make('categories.name')
                    ->badge()
                    ->color('primary')
                    ->separator(','),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'scheduled' => 'info',
                        'draft' => 'gray',
                        default => 'gray',
                    }),
                TextColumn::make('published_at')
                    ->dateTime('M d, Y H:i')
                    ->sortable(),
                TextColumn::make('views_count')
                    ->numeric()
                    ->sortable()
                    ->label('Views'),
                TextColumn::make('likes_count')
                    ->numeric()
                    ->sortable()
                    ->label('Likes'),
                TextColumn::make('author.name')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
