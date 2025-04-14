<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\LeaveRequest;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LeaveRequestResource\Pages;
use App\Filament\Resources\LeaveRequestResource\RelationManagers;

class LeaveRequestResource extends Resource
{
    protected static ?string $model = LeaveRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                ->label('Full Names')
                ->options(User::all()->pluck('name', 'id'))
                ->searchable()
                ->required(),
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->required(),
            Forms\Components\Select::make('status')
                ->options([
                    'Approved' => 'Approved',
                    'Pending' => 'Pending',
                    'Rejected' => 'Rejected',
                ])
                ->native(false)  ->required(),
                Forms\Components\Select::make('leave_type')
                    ->options([
                        'Sick Leave' => 'Sick Leave',
                        'Annual Leave' => 'Annual Leave',
                        'Casual Leave' => 'Casual Leave',
                        'Maternity Leave' => 'Maternity Leave',
                        'Paternity Leave' => 'Paternity Leave',
                        'Compassionate Leave' => 'Compassionate Leave',
                        'Unpaid Leave' => 'Unpaid Leave',
                        'Public Holiday' => 'Public Holiday',
                        'Study Leave' => 'Study Leave',
                        'Sabbatical Leave' => 'Sabbatical Leave',
                        'Bereavement Leave' => 'Bereavement Leave',
                        'Jury Duty Leave' => 'Jury Duty Leave',
                        'Military Leave' => 'Military Leave',
                        'Parental Leave' => 'Parental Leave',
                        'Volunteer Leave' => 'Volunteer Leave',
                        'Other Leave' => 'Other Leave',
                    ])
                    ->native(false)
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state === 'Sick Leave') {
                            $set('sick_leave_form', null);
                        }
                    }),

                Forms\Components\FileUpload::make('sick_leave_form')
                    ->label('Upload Doctor\'s Note')
                    ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
                    ->maxSize(1024) // 1MB
                    ->required(fn($get) => $get('leave_type') === 'Sick Leave')
                    ->preserveFilenames(),
                Forms\Components\Radio::make('Duration')
                    ->options([
                        'Full Day' => 'Full Day',
                        'Half Day' => 'Half Day',
                        'Quarter Day' => 'Quarter Day',
                    ]),
                Forms\Components\Textarea::make('notes'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn(string $state): string => match ($state) {
                  //  'draft' => 'gray',
                    'pending' => 'warning',
                    'approved' => 'success',
                    'rejected' => 'danger',
                })
                    ->searchable(),
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
            'index' => Pages\ListLeaveRequests::route('/'),
            'create' => Pages\CreateLeaveRequest::route('/create'),
            'edit' => Pages\EditLeaveRequest::route('/{record}/edit'),
        ];
    }
}
