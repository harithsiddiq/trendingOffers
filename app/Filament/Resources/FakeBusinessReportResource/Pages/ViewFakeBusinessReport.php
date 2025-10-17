<?php

namespace App\Filament\Resources\FakeBusinessReportResource\Pages;

use App\Filament\Resources\FakeBusinessReportResource;
use Filament\Resources\Pages\ViewRecord;

class ViewFakeBusinessReport extends ViewRecord
{
    protected static string $resource = FakeBusinessReportResource::class;

    protected function getHeaderActions(): array
    {
        // Read-only: no edit or delete actions
        return [];
    }
}