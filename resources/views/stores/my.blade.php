<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Stores - Makan</title>
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
                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-3 rounded-full">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-4xl font-bold text-white mb-2">My Stores</h1>
                <p class="text-purple-200">Manage your restaurant listings</p>
            </div>

            <!-- Add Store Button -->
            <div class="mb-8 text-center">
                <a href="{{ route('stores.create') }}" class="inline-flex items-center bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New Store
                </a>
            </div>

            <!-- Stores Grid -->
            @if($stores->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($stores as $store)
                        <div class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 p-6 hover:bg-white/15 transition-all duration-300">
                            <!-- Store Logo -->
                            @if($store->logo_url)
                                <div class="mb-4">
                                    <img src="{{ $store->logo_url }}" alt="{{ $store->name }}" class="w-16 h-16 rounded-full object-cover mx-auto">
                                </div>
                            @endif

                            <!-- Store Info -->
                            <div class="text-center mb-4">
                                <h3 class="text-xl font-bold text-white mb-2">{{ $store->name }}</h3>
                                <p class="text-purple-200 text-sm mb-2">{{ Str::limit($store->description, 100) }}</p>
                                <p class="text-purple-300 text-xs">{{ $store->address }}</p>
                            </div>

                            <!-- Store Details -->
                            <div class="space-y-2 mb-4">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-purple-300">Region:</span>
                                    <span class="text-white">{{ $store->region->name ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-purple-300">Category:</span>
                                    <span class="text-white">{{ $store->category->name ?? 'N/A' }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-purple-300">Status:</span>
                                    <span class="{{ $store->is_published ? 'text-green-400' : 'text-yellow-400' }}">
                                        {{ $store->is_published ? 'Published' : 'Draft' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-sm transition-colors duration-200">
                                    Edit
                                </button>
                                <button class="flex-1 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg text-sm transition-colors duration-200">
                                    View
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">No Stores Yet</h3>
                    <p class="text-purple-200 mb-6">You haven't created any stores yet. Start by adding your first restaurant!</p>
                    <a href="{{ route('stores.create') }}" class="inline-flex items-center bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Create Your First Store
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