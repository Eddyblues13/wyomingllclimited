<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Wyoming LLC Attorney</title>
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
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '7fff036646f0b2976bbd9f7338d1a51144cb2068';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
</head>
<body class="bg-gray-50 min-h-screen" x-data="{ showBanner: true }">
    <!-- Top Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/"><img src="{{ asset('logo.webp') }}" alt="Wyoming LLC Attorney" class="h-10 w-auto" /></a>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <span class="text-sm">Feedback</span>
                    </button>
                    <a href="/new" class="text-gray-700 hover:text-gray-900 font-medium transition">Register</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Purple Banner -->
    <div x-show="showBanner" x-transition class="bg-purple-custom text-white py-3 px-4 relative">
        <div class="container mx-auto">
            <div class="flex items-center justify-between">
                <div class="flex-1 text-center lg:text-left">
                    <p class="text-sm lg:text-base">
                        Welcome back! Access your Wyoming LLC formation account to track your application status and manage your business.
                    </p>
                </div>
                <button @click="showBanner = false" class="ml-4 text-white hover:text-gray-200 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 lg:py-16 max-w-md">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="w-24 h-24 lg:w-32 lg:h-32 mx-auto mb-6 bg-gradient-to-br from-navy to-blue-700 rounded-2xl flex items-center justify-center shadow-lg">
                <svg class="w-12 h-12 lg:w-16 lg:h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Welcome Back</h1>
            <p class="text-lg text-gray-600 leading-relaxed">
                Sign in to your Wyoming LLC Attorney account to continue your business formation journey.
            </p>
        </div>

        <!-- Login Form Card -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                @foreach($errors->all() as $error)
                    <p class="text-sm">{{ $error }}</p>
                @endforeach
            </div>
            @endif

            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
            @endif

            @if(request('registered'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Company formation application submitted successfully! Please sign in to track your progress.</span>
                </div>
            </div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="space-y-6">
                    <!-- Email Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                               class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                               placeholder="Enter your email address">
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password-field" required
                                   class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors pr-12"
                                   placeholder="Enter your password">
                            <button type="button"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                                    onclick="togglePassword()">
                                <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember"
                                   class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center">
                        Sign In
                    </button>

                    <!-- Register Link -->
                    <div class="text-center">
                        <p class="text-gray-600 mt-2">
                            Want to start a new company?
                            <a href="/new" class="text-orange hover:text-orange-600 font-medium transition-colors">Form Your LLC</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>

        <!-- Additional Information -->
        <div class="mt-8 text-center">
            <div class="bg-blue-50 rounded-2xl p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Need Help?</h3>
                <p class="text-gray-600 text-sm mb-4">
                    Our customer support team is here to assist you with your account and business formation questions.
                </p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <a href="#" class="border border-gray-300 hover:border-gray-400 text-gray-700 font-medium py-2 px-4 rounded-lg transition-colors text-sm">
                        Contact Support
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-16">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <a href="/"><img src="{{ asset('logo.webp') }}" alt="Wyoming LLC Attorney" class="h-8 w-auto" /></a>
                </div>
                <div class="flex flex-wrap justify-center md:justify-end gap-6 text-gray-600">
                    <a href="#" class="hover:text-gray-800 transition">Privacy Policy</a>
                    <a href="#" class="hover:text-gray-800 transition">Terms of Service</a>
                    <a href="#" class="hover:text-gray-800 transition">Contact</a>
                </div>
            </div>
            <div class="mt-4 text-center text-gray-500 text-sm">
                <p>&copy; {{ date('Y') }} Wyoming LLC Attorney. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password-field');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L12 12m-2.122-2.122L7.76 7.76m4.242 4.242L12 12m0 0l2.122 2.122M12 12l-2.122-2.122"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>';
            } else {
                passwordField.type = 'password';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            }
        }
    </script>
</body>
</html>
