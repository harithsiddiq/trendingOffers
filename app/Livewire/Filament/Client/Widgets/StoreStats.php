<?php

namespace App\Livewire\Filament\Client\Widgets;

use App\Models\Offer;
use App\Models\Review;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StoreStats extends Component
{
    public function render()
    {
        $userId = Auth::id();
        
        $storeCount = Store::where('user_id', $userId)->count();
        $activeOffers = Offer::whereHas('store', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('is_active', true)->count();
        
        $reviewCount = Review::whereHas('store', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        return view('livewire.filament.client.widgets.store-stats', [
            'storeCount' => $storeCount,
            'activeOffers' => $activeOffers,
            'reviewCount' => $reviewCount,
        ]);
    }
}