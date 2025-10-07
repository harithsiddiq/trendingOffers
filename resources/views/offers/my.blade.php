<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Offers - Makan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    
    <div class="relative min-h-screen py-8">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center mb-4">
                    <div class="bg-gradient-to-r from-green-500 to-blue-500 p-3 rounded-full">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-4xl font-bold text-white mb-2">My Offers</h1>
                <p class="text-purple-200">Manage your promotional offers</p>
            </div>

            <!-- Add Offer Button -->
            <div class="mb-8 text-center">
                <a href="{{ route('offers.create') }}" class="inline-flex items-center bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New Offer
                </a>
            </div>

            <!-- Offers Grid -->
            @if($offers->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($offers as $offer)
                        <div class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 p-6 hover:bg-white/15 transition-all duration-300">
                            <!-- Offer Header -->
                            <div class="mb-4">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="text-xl font-bold text-white">{{ $offer->title }}</h3>
                                    <span class="{{ $offer->is_offer_valid ? 'bg-green-500' : 'bg-red-500' }} text-white text-xs px-2 py-1 rounded-full">
                                        {{ $offer->is_offer_valid ? 'Active' : 'Expired' }}
                                    </span>
                                </div>
                                <p class="text-purple-300 text-sm">{{ $offer->store->name }}</p>
                            </div>

                            <!-- Offer Description -->
                            <div class="mb-4">
                                <p class="text-purple-200 text-sm">{{ Str::limit($offer->description, 120) }}</p>
                            </div>

                            <!-- Discount Info -->
                            <div class="bg-white/5 rounded-lg p-4 mb-4">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-white mb-1">
                                        @if($offer->discount_type === 'percentage')
                                            {{ $offer->discount_value }}%
                                        @else
                                            {{ $offer->discount_value }} SAR
                                        @endif
                                    </div>
                                    <div class="text-purple-300 text-sm">
                                        {{ $offer->discount_type === 'percentage' ? 'Percentage Discount' : 'Fixed Discount' }}
                                    </div>
                                </div>
                            </div>

                            <!-- Offer Details -->
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-purple-300">Start Date:</span>
                                    <span class="text-white">{{ \Carbon\Carbon::parse($offer->start_date)->format('M d, Y') }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-purple-300">End Date:</span>
                                    <span class="text-white">{{ \Carbon\Carbon::parse($offer->end_date)->format('M d, Y') }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-purple-300">Status:</span>
                                    <span class="{{ $offer->is_active ? 'text-green-400' : 'text-red-400' }}">
                                        {{ $offer->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-sm transition-colors duration-200">
                                    Edit
                                </button>
                                <button class="flex-1 bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg text-sm transition-colors duration-200">
                                    Delete
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 p-12 text-center">
                    <div class="mb-6">
                        <svg class="w-16 h-16 text-purple-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">No Offers Yet</h3>
                    <p class="text-purple-200 mb-6">You haven't created any offers yet. Start promoting your stores with attractive deals!</p>
                    <a href="{{ route('offers.create') }}" class="inline-flex items-center bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Create Your First Offer
                    </a>
                </div>
            @endif

            <!-- Back to Dashboard -->
            <div class="mt-8 text-center">
                <a href="{{ route('dashboard') }}" class="text-purple-300 hover:text-white transition-colors duration-200 font-medium">
                    ← Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</body>
</html>