<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Owner Registration - TrendingOffers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#8B0000',
                        primaryLight: '#A52A2A',
                        primaryDark: '#660000',
                        secondary: '#FFFDD0',
                        secondaryLight: '#FFFFF0',
                        accent: '#FF6B35',
                    },
                    borderRadius: {
                        'sm': '8px',
                        'md': '12px',
                        'lg': '16px',
                    }
                }
            }
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FAFAFA] min-h-screen p-4 relative">
    <!-- Background decoration -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%238B0000" fill-opacity="0.03"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
    <div class="w-full max-w-md mx-auto py-8">
        <!-- Logo/Brand -->
        <div class="text-center mb-8 relative z-10">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-primary rounded-full mb-4 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-primary mb-2 tracking-tight">TrendingOffers</h1>

        </div>

        <!-- Registration Form -->
        <div class="bg-white rounded-lg shadow-lg p-8 border border-[#E0E0E0] relative z-10">
            <form method="POST" action="{{ route('store-owner.register.submit') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-[#212121] mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        Full Name
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           value="{{ old('name') }}"
                           class="w-full px-5 py-4 border border-[#E0E0E0] rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-300 bg-white hover:bg-[#FFFDD0]/10 @error('name') border-[#F44336] @enderror text-[#212121] placeholder-[#757575]"
                           placeholder="Enter your full name"
                           required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-[#212121] mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        Email Address
                    </label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="w-full px-5 py-4 border border-[#E0E0E0] rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-300 bg-white hover:bg-[#FFFDD0]/10 @error('email') border-[#F44336] @enderror text-[#212121] placeholder-[#757575]"
                           placeholder="Enter your email address"
                           required>
                    @error('email')
                        <p class="mt-1 text-sm text-[#F44336]">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CR Number Field -->
                <div>
                    <label for="cr_number" class="block text-sm font-semibold text-[#212121] mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M5 8a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm0 3a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"/>
                        </svg>
                        Commercial Registration Number
                    </label>
                    <input type="text"
                           id="cr_number"
                           name="cr_number"
                           value="{{ old('cr_number') }}"
                           class="w-full px-5 py-4 border border-[#E0E0E0] rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-300 bg-white hover:bg-[#FFFDD0]/10 @error('cr_number') border-[#F44336] @enderror text-[#212121] placeholder-[#757575]"
                           placeholder="Enter your CR number"
                           required>
                    @error('cr_number')
                        <p class="mt-1 text-sm text-[#F44336]">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CR Image Upload -->
                <div>
                    <label for="cr_image" class="block text-sm font-semibold text-[#212121] mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                        </svg>
                        Commercial Registration Document
                    </label>
                    <div class="relative">
                        <input type="file"
                               id="cr_image"
                               name="cr_image"
                               accept="image/*"
                               class="w-full px-5 py-4 border border-[#E0E0E0] rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-300 bg-white hover:bg-[#FFFDD0]/10 @error('cr_image') border-[#F44336] @enderror file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#FFFDD0] file:text-[#212121] hover:file:bg-[#F5F5DC] file:shadow-md"
                               required>
                    </div>
                    @error('cr_image')
                        <p class="mt-1 text-sm text-[#F44336]">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-xs text-[#757575] flex items-center">
                        <svg class="w-3 h-3 mr-1 text-primary/60" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        Upload a clear image of your commercial registration document (JPEG, PNG, JPG, GIF - Max: 2MB)
                    </p>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-[#212121] mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                        </svg>
                        Password
                    </label>
                    <input type="password"
                           id="password"
                           name="password"
                           class="w-full px-5 py-4 border border-[#E0E0E0] rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-300 bg-white hover:bg-[#FFFDD0]/10 @error('password') border-[#F44336] @enderror text-[#212121] placeholder-[#757575]"
                           placeholder="Create a strong password"
                           required>
                    @error('password')
                        <p class="mt-1 text-sm text-[#F44336]">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-[#212121] mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Confirm Password
                    </label>
                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           class="w-full px-5 py-4 border border-[#E0E0E0] rounded-md focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all duration-300 bg-white hover:bg-[#FFFDD0]/10 text-[#212121] placeholder-[#757575]"
                           placeholder="Confirm your password"
                           required>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-primary text-white font-bold py-4 px-6 rounded-md hover:bg-primaryLight focus:outline-none focus:ring-2 focus:ring-primary/50 focus:ring-offset-2 transform transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] shadow-md hover:shadow-lg relative overflow-hidden">
                    <span class="relative z-10 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Create Store Owner Account
                    </span>
                </button>
            </form>

            <!-- Additional Links -->
            {{-- <div class="mt-8 text-center">
                <p class="text-sm text-[#757575]">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-primary font-semibold transition-all duration-300 hover:underline">Sign in here</a>
                </p>
            </div> --}}
        </div>

        <!-- Footer -->
        <div class="text-center mt-8 relative z-10">
            <p class="text-xs text-[#757575]">
                By registering, you agree to our
                <a href="#" class="text-primary hover:text-primaryLight font-medium transition-colors duration-300 underline decoration-dotted">Terms of Service</a> and
                <a href="#" class="text-primary hover:text-primaryLight font-medium transition-colors duration-300 underline decoration-dotted">Privacy Policy</a>
            </p>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="fixed top-6 right-6 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg z-50 border border-green-400/20">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="fixed top-6 right-6 bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg z-50 border border-red-400/20">
            <div class="flex items-start">
                <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                <ul class="space-y-1">
                    @foreach($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</body>
</html>
