<?php

namespace App\Filament\Resources\BenefitEnrollmentResource\Pages;

use App\Filament\Resources\BenefitEnrollmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBenefitEnrollment extends EditRecord
{
    protected static string $resource = BenefitEnrollmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
