<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Wyoming LLC Attorney</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { 'navy': '#1e3a8a', 'orange': '#f97316', 'purple-custom': '#6366f1' } } }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-gray-900 via-navy to-gray-900 min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md">
        <!-- Admin Badge -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br from-orange to-yellow-500 rounded-2xl flex items-center justify-center shadow-2xl shadow-orange/20">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-white mb-1">Admin Panel</h1>
            <p class="text-gray-400">Wyoming LLC Attorney Management</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white/10 backdrop-blur-xl rounded-2xl shadow-2xl p-8 border border-white/10">
            @if($errors->any())
            <div class="bg-red-500/20 border border-red-500/30 text-red-300 px-4 py-3 rounded-lg mb-6">
                @foreach($errors->all() as $error)
                    <p class="text-sm">{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full p-4 bg-white/5 border border-white/10 rounded-lg text-white placeholder-gray-500 focus:ring-2 focus:ring-orange focus:border-orange transition"
                           placeholder="admin@wyomingllc.com">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="admin-password-field" required
                               class="w-full p-4 bg-white/5 border border-white/10 rounded-lg text-white placeholder-gray-500 focus:ring-2 focus:ring-orange focus:border-orange transition pr-12"
                               placeholder="Enter admin password">
                        <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-300 transition-colors" onclick="togglePw('admin-password-field', this)">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded border-gray-600 text-orange focus:ring-orange bg-white/5">
                    <label for="remember" class="ml-2 text-sm text-gray-400">Remember me</label>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-orange to-yellow-500 hover:from-orange-600 hover:to-yellow-600 text-white font-semibold py-4 rounded-lg transition-all duration-200 shadow-lg shadow-orange/20 hover:shadow-orange/40">
                    Sign In to Admin Panel
                </button>
            </form>
        </div>

        <div class="text-center mt-6">
            <a href="/" class="text-gray-500 hover:text-gray-300 text-sm transition">&larr; Back to website</a>
        </div>
    </div>

    <script>
        function togglePw(fieldId, btn) {
            const field = document.getElementById(fieldId);
            const svg = btn.querySelector('svg');
            if (field.type === 'password') {
                field.type = 'text';
                svg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6 6m3.878 3.878L12 12"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"></path>';
            } else {
                field.type = 'password';
                svg.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            }
        }
    </script>
</body>
</html>
