<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Wyoming LLC Attorney</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'navy': '#1e3a8a',
                        'orange': '#f97316',
                        'purple-custom': '#6366f1'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col font-sans antialiased text-gray-900">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-100">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('logo.webp') }}" alt="Wyoming LLC Attorney" class="h-10 w-auto" onerror="this.src='https://placehold.co/200x50/1e3a8a/FFF?text=Wyoming+LLC+Attorney'">
            </a>
            <a href="/" class="text-sm font-medium text-gray-500 hover:text-navy transition-colors">Return Home</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 flex items-center justify-center p-6 relative overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute inset-0 pointer-events-none z-0 overflow-hidden">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-purple-custom opacity-10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-orange opacity-10 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-2xl w-full bg-white rounded-2xl shadow-xl border border-gray-100 p-8 md:p-12 text-center relative z-10">
            
            <div class="w-24 h-24 bg-gray-50 rounded-2xl mx-auto flex items-center justify-center mb-6 border border-gray-100 shadow-sm rotate-3">
                <span class="text-4xl font-black text-navy transform -rotate-3">@yield('code')</span>
            </div>

            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 tracking-tight">@yield('title')</h1>
            
            <p class="text-lg text-gray-500 mb-8 max-w-lg mx-auto">
                @yield('message')
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center space-y-3 sm:space-y-0 sm:space-x-4">
                <a href="/" class="w-full sm:w-auto px-6 py-3 bg-navy text-white font-medium rounded-lg hover:bg-blue-900 transition shadow-lg shadow-navy/20 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Back to Home
                </a>
                <button onclick="window.history.back()" class="w-full sm:w-auto px-6 py-3 bg-white text-gray-700 font-medium rounded-lg border border-gray-200 hover:bg-gray-50 transition flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Go Back
                </button>
            </div>
            
            <div class="mt-10 pt-6 border-t border-gray-100">
                <p class="text-sm text-gray-400">
                    Need assistance? <a href="/#contact" class="text-navy hover:underline">Contact our support team</a>.
                </p>
            </div>
        </div>
    </main>
</body>
</html>
