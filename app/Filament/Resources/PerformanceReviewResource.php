<?php

namespace App\Filament\Resources;

use App\Models\User;
use App\Filament\Resources\PerformanceReviewResource\Pages;
use App\Filament\Resources\PerformanceReviewResource\RelationManagers;
use App\Models\PerformanceReview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PerformanceReviewResource extends Resource
{
    protected static ?string $model = PerformanceReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->options(User::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\Textarea::make('comments')
                    ->required(),
                Forms\Components\TextInput::make('rating')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('review_date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('comments')
                    ->limit(50)
                    ->sortable(),
                Tables\Columns\TextColumn::make('review_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListPerformanceReviews::route('/'),
            'create' => Pages\CreatePerformanceReview::route('/create'),
            'edit' => Pages\EditPerformanceReview::route('/{record}/edit'),
        ];
    }
}
