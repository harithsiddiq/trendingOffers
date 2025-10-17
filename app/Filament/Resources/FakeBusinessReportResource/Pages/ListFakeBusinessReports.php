<?php

namespace App\Filament\Resources\FakeBusinessReportResource\Pages;

use App\Filament\Resources\FakeBusinessReportResource;
use Filament\Resources\Pages\ListRecords;

class ListFakeBusinessReports extends ListRecords
{
    protected static string $resource = FakeBusinessReportResource::class;

    protected function getHeaderActions(): array
    {
        // Read-only: no create actions
        return [];
    }
}