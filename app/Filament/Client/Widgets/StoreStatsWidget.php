<?php

namespace App\Filament\Client\Widgets;

use App\Models\Offer;
use App\Models\Review;
use App\Models\Store;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class StoreStatsWidget extends BaseWidget
{
    protected static ?string $pollingInterval = '60s';

    protected function getStats(): array
    {
        $userId = Auth::id();
        
        $storeCount = Store::where('user_id', $userId)->count();
        $activeOffers = Offer::whereHas('store', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('is_active', true)->count();
        
        $reviewCount = Review::whereHas('store', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        return [
            Stat::make(__('My Stores'), $storeCount)
                ->description(__('Total stores you manage'))
                ->descriptionIcon('heroicon-m-building-storefront')
                ->color('primary'),
                
            Stat::make(__('Active Offers'), $activeOffers)
                ->description(__('Currently active offers'))
                ->descriptionIcon('heroicon-m-tag')
                ->color('success'),
                
            Stat::make(__('Total Reviews'), $reviewCount)
                ->description(__('Customer reviews for your stores'))
                ->descriptionIcon('heroicon-m-star')
                ->color('warning'),
        ];
    }
}