<?php

namespace App\Filament\Resources\BenefitEnrollmentResource\Pages;

use App\Filament\Resources\BenefitEnrollmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBenefitEnrollments extends ListRecords
{
    protected static string $resource = BenefitEnrollmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
