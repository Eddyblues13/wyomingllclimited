<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Settings - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { 'navy': '#1e3a8a', 'orange': '#f97316', 'purple-custom': '#6366f1' } } } }
    </script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-900 min-h-screen" x-data="{ sidebarOpen: false }">
    <!-- Top Bar -->
    <header class="bg-gray-800 border-b border-gray-700 sticky top-0 z-50">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center space-x-4">
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-orange to-yellow-500 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <span class="text-white font-semibold text-lg hidden sm:block">Admin Panel</span>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-gray-400 text-sm hidden sm:block">{{ Auth::guard('admin')->user()->name }}</span>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-400 hover:text-red-400 transition text-sm">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/60 z-40 lg:hidden" @click="sidebarOpen = false"></div>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-800 border-r border-gray-700 transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 pt-14 lg:pt-0" :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            <nav class="p-4 space-y-1 mt-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700/50 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700/50 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path></svg>
                    <span>Users</span>
                </a>
                <a href="{{ route('admin.companies') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700/50 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    <span>Companies</span>
                </a>
                <a href="{{ route('admin.crypto-settings') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg bg-orange/10 text-orange border border-orange/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M12 1V3M12 21V23M4.22 4.22L5.64 5.64M18.36 18.36L19.78 19.78M1 12H3M21 12H23M4.22 19.78L5.64 18.36M18.36 5.64L19.78 4.22"/>
                    </svg>
                    <span>Crypto Settings</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 lg:p-8">
            @if(session('success'))
            <div class="bg-green-500/20 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
            @endif

            <div class="mb-8">
                <h1 class="text-2xl lg:text-3xl font-bold text-white mb-1">Crypto Deposit Settings</h1>
                <p class="text-gray-400">Configure and update the dynamic deposit addresses for all 18 supported cryptocurrency networks.</p>
            </div>

            <!-- Configuration Card Form -->
            <form method="POST" action="{{ route('admin.crypto-settings.update') }}">
                @csrf
                <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden shadow-xl">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-700 bg-gray-900/50">
                                    <th class="text-left py-4 px-6 text-gray-400 text-xs font-semibold uppercase tracking-wider">Asset</th>
                                    <th class="text-left py-4 px-6 text-gray-400 text-xs font-semibold uppercase tracking-wider">Network</th>
                                    <th class="text-left py-4 px-6 text-gray-400 text-xs font-semibold uppercase tracking-wider w-1/2">Deposit Address</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700/50">
                                @forelse($cryptos as $crypto)
                                <tr class="hover:bg-gray-700/20 transition-colors">
                                    <!-- Asset Logo & Name -->
                                    <td class="py-4 px-6 text-white text-sm">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background-color: {{ $crypto->bg_color ?? '#2b3648' }};">
                                                <img src="{{ $crypto->icon_url }}" alt="{{ $crypto->name }}" class="w-5 h-5 object-contain">
                                            </div>
                                            <div>
                                                <span class="font-bold text-white tracking-wide block uppercase">{{ $crypto->name }}</span>
                                                <span class="text-gray-400 text-xs uppercase">{{ $crypto->symbol }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Network Badge -->
                                    <td class="py-4 px-6 text-sm">
                                        <span class="inline-block px-2.5 py-1 text-xs rounded-full font-bold uppercase bg-gray-700 border border-gray-600 text-orange">
                                            {{ $crypto->network }}
                                        </span>
                                    </td>
                                    <!-- Address Input field -->
                                    <td class="py-4 px-6">
                                        <input type="text" 
                                               name="addresses[{{ $crypto->id }}]" 
                                               value="{{ $crypto->deposit_address }}" 
                                               placeholder="Enter new {{ $crypto->symbol }} address" 
                                               class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 text-white font-mono text-sm focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange transition-all">
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="py-8 text-center text-gray-500">No coins configured in the database. Please run the seeder.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Form Submission Bar -->
                    <div class="bg-gray-900/50 border-t border-gray-700 p-6 flex justify-end">
                        <button type="submit" class="bg-orange hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-xl shadow-lg transition-all transform hover:scale-105 active:scale-95">
                            Save Settings
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
