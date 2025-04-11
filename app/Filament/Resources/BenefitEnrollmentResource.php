<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BenefitEnrollmentResource\Pages;
use App\Filament\Resources\BenefitEnrollmentResource\RelationManagers;
use App\Models\BenefitEnrollment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BenefitEnrollmentResource extends Resource
{
    protected static ?string $model = BenefitEnrollment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('benefit_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('enrolled_on')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('benefit_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('enrolled_on')
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
            'index' => Pages\ListBenefitEnrollments::route('/'),
            'create' => Pages\CreateBenefitEnrollment::route('/create'),
            'edit' => Pages\EditBenefitEnrollment::route('/{record}/edit'),
        ];
    }
}
