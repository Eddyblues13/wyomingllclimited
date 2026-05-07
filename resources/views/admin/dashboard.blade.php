<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Wyoming LLC Attorney</title>
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
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg bg-orange/10 text-orange border border-orange/20">
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
                <div class="pt-4 border-t border-gray-700 mt-4">
                    <a href="/" target="_blank" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-500 hover:text-gray-300 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        <span>View Website</span>
                    </a>
                </div>
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
                <h1 class="text-2xl lg:text-3xl font-bold text-white mb-1">Dashboard Overview</h1>
                <p class="text-gray-400">Monitor and manage all business registrations.</p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
                <div class="bg-gray-800 rounded-xl p-4 lg:p-6 border border-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-blue-500/10 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path></svg>
                        </div>
                    </div>
                    <p class="text-2xl lg:text-3xl font-bold text-white">{{ $totalUsers }}</p>
                    <p class="text-gray-400 text-sm">Total Users</p>
                </div>
                <div class="bg-gray-800 rounded-xl p-4 lg:p-6 border border-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-purple-500/10 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    </div>
                    <p class="text-2xl lg:text-3xl font-bold text-white">{{ $totalCompanies }}</p>
                    <p class="text-gray-400 text-sm">Total Companies</p>
                </div>
                <div class="bg-gray-800 rounded-xl p-4 lg:p-6 border border-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-yellow-500/10 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <p class="text-2xl lg:text-3xl font-bold text-white">{{ $pendingCompanies }}</p>
                    <p class="text-gray-400 text-sm">Pending</p>
                </div>
                <div class="bg-gray-800 rounded-xl p-4 lg:p-6 border border-gray-700">
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-10 h-10 bg-green-500/10 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <p class="text-2xl lg:text-3xl font-bold text-white">{{ $approvedCompanies }}</p>
                    <p class="text-gray-400 text-sm">Approved</p>
                </div>
            </div>

            <!-- Recent Tables -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                <!-- Recent Users -->
                <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
                    <div class="flex items-center justify-between p-4 lg:p-6 border-b border-gray-700">
                        <h3 class="text-lg font-semibold text-white">Recent Users</h3>
                        <a href="{{ route('admin.users') }}" class="text-orange hover:text-orange-400 text-sm transition">View All &rarr;</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead><tr class="border-b border-gray-700"><th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">Name</th><th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">Email</th><th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">Joined</th></tr></thead>
                            <tbody>
                                @forelse($recentUsers as $user)
                                <tr class="border-b border-gray-700/50 hover:bg-gray-700/30">
                                    <td class="py-3 px-4 text-white text-sm">{{ $user->name }}</td>
                                    <td class="py-3 px-4 text-gray-400 text-sm">{{ $user->email }}</td>
                                    <td class="py-3 px-4 text-gray-500 text-sm">{{ $user->created_at->format('M d') }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="py-6 text-center text-gray-500">No users yet</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recent Companies -->
                <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
                    <div class="flex items-center justify-between p-4 lg:p-6 border-b border-gray-700">
                        <h3 class="text-lg font-semibold text-white">Recent Companies</h3>
                        <a href="{{ route('admin.companies') }}" class="text-orange hover:text-orange-400 text-sm transition">View All &rarr;</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead><tr class="border-b border-gray-700"><th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">Company</th><th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">Owner</th><th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">Status</th></tr></thead>
                            <tbody>
                                @forelse($recentCompanies as $company)
                                <tr class="border-b border-gray-700/50 hover:bg-gray-700/30">
                                    <td class="py-3 px-4 text-white text-sm">{{ $company->company_name }}</td>
                                    <td class="py-3 px-4 text-gray-400 text-sm">{{ $company->user->name ?? 'N/A' }}</td>
                                    <td class="py-3 px-4">
                                        <span class="inline-block px-2 py-1 text-xs rounded-full
                                            @if($company->status === 'approved') bg-green-500/20 text-green-400
                                            @elseif($company->status === 'pending') bg-yellow-500/20 text-yellow-400
                                            @elseif($company->status === 'processing') bg-blue-500/20 text-blue-400
                                            @else bg-red-500/20 text-red-400
                                            @endif">{{ ucfirst($company->status) }}</span>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="py-6 text-center text-gray-500">No companies yet</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
