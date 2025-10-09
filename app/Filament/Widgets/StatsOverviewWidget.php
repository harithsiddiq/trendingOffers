<?php

namespace App\Filament\Widgets;

use App\Models\Store;
use App\Models\Offer;
use App\Models\Review;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?string $pollingInterval = '60s';

    protected function getStats(): array
    {
        return [
            Stat::make(__('Total Stores'), Store::count())
                ->description(__('Number of stores in the system'))
                ->descriptionIcon('heroicon-m-building-storefront')
                ->color('primary'),
                
            Stat::make(__('Active Offers'), Offer::where('is_active', true)->count())
                ->description(__('Currently active offers'))
                ->descriptionIcon('heroicon-m-tag')
                ->color('success'),
                
            Stat::make(__('Total Reviews'), Review::count())
                ->description(__('Customer reviews'))
                ->descriptionIcon('heroicon-m-star')
                ->color('warning'),
                
            Stat::make(__('Store Owners'), User::where('role', 'store_owner')->count())
                ->description(__('Registered store owners'))
                ->descriptionIcon('heroicon-m-user')
                ->color('danger'),
        ];
    }
}