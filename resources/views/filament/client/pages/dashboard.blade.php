<x-filament-panels::page>
    <div class="p-4 bg-white dark:bg-gray-800 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4">{{ __('Welcome to Your Store Dashboard') }}</h2>
        
        <div class="mb-6">
            <p class="text-gray-600 dark:text-gray-300">{{ __('Manage your stores, offers, and view statistics all in one place.') }}</p>
        </div>
        
        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">{{ __('Quick Actions') }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('filament.client.resources.stores.index') }}" class="p-4 bg-amber-50 dark:bg-gray-700 rounded-lg flex items-center">
                    <span class="mr-3 text-amber-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </span>
                    <span>{{ __('Manage Stores') }}</span>
                </a>
                
                <a href="{{ route('filament.client.resources.offers.index') }}" class="p-4 bg-amber-50 dark:bg-gray-700 rounded-lg flex items-center">
                    <span class="mr-3 text-amber-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </span>
                    <span>{{ __('Manage Offers') }}</span>
                </a>
                
                <a href="#" class="p-4 bg-amber-50 dark:bg-gray-700 rounded-lg flex items-center">
                    <span class="mr-3 text-amber-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </span>
                    <span>{{ __('View Analytics') }}</span>
                </a>
            </div>
        </div>
        
        <div>
            <h3 class="text-xl font-semibold mb-4">{{ __('Store Statistics') }}</h3>
            <livewire:filament.client.widgets.store-stats />
        </div>
    </div>
</x-filament-panels::page>