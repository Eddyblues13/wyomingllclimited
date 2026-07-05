<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Wyoming LLC Attorney</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { 'navy': '#1e3a8a', 'orange': '#f97316' } } } }
    </script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-900 min-h-screen" x-data="{ sidebarOpen: false }">

    <!-- Top Bar -->
    <header class="bg-gray-800 border-b border-gray-700 sticky top-0 z-50">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center gap-3">
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-400 hover:text-white p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-orange to-yellow-500 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <span class="text-white font-semibold hidden sm:block">Admin Panel</span>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-gray-400 text-sm hidden sm:block truncate max-w-[160px]">{{ Auth::guard('admin')->user()->name }}</span>
                <form method="POST" action="{{ route('admin.logout') }}">@csrf
                    <button type="submit" class="text-gray-400 hover:text-red-400 transition text-sm whitespace-nowrap">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Mobile Overlay -->
    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-black/60 z-40 lg:hidden" @click="sidebarOpen = false"></div>

    <div class="flex min-h-[calc(100vh-57px)]">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-800 border-r border-gray-700 transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-0 pt-14 lg:pt-0 flex-shrink-0"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            <nav class="p-4 space-y-1 mt-4 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-orange/10 text-orange border border-orange/20">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700/50 transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
                    <span>Users</span>
                </a>
                <a href="{{ route('admin.companies') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700/50 transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span>Companies</span>
                </a>
                <a href="{{ route('admin.manage-crypto') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700/50 transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Manage Crypto</span>
                </a>
                <a href="{{ route('admin.crypto-settings') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700/50 transition">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 1V3M12 21V23M4.22 4.22L5.64 5.64M18.36 18.36L19.78 19.78M1 12H3M21 12H23M4.22 19.78L5.64 18.36M18.36 5.64L19.78 4.22"/></svg>
                    <span>Crypto Settings</span>
                </a>
                <div class="pt-4 mt-4 border-t border-gray-700">
                    <a href="/" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-500 hover:text-gray-300 transition">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        <span>View Website</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main -->
        <main class="flex-1 min-w-0 p-4 lg:p-8">
            @if(session('success'))
            <div class="bg-green-500/20 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-6 text-sm">{{ session('success') }}</div>
            @endif

            <div class="mb-6">
                <h1 class="text-2xl lg:text-3xl font-bold text-white">Dashboard Overview</h1>
                <p class="text-gray-400 text-sm mt-1">Monitor and manage all business registrations.</p>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 xl:grid-cols-4 gap-3 lg:gap-5 mb-8">
                @foreach([
                    ['label' => 'Total Users', 'value' => $totalUsers, 'color' => 'blue', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z'],
                    ['label' => 'Total Companies', 'value' => $totalCompanies, 'color' => 'purple', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                    ['label' => 'Pending', 'value' => $pendingCompanies, 'color' => 'yellow', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['label' => 'Approved', 'value' => $approvedCompanies, 'color' => 'green', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                ] as $stat)
                <div class="bg-gray-800 rounded-xl p-4 lg:p-5 border border-gray-700">
                    <div class="w-9 h-9 bg-{{ $stat['color'] }}-500/10 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-{{ $stat['color'] }}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/></svg>
                    </div>
                    <p class="text-2xl lg:text-3xl font-bold text-white">{{ $stat['value'] }}</p>
                    <p class="text-gray-400 text-xs mt-0.5">{{ $stat['label'] }}</p>
                </div>
                @endforeach
            </div>

            <!-- Recent Tables -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
                <!-- Recent Users -->
                <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
                    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-700">
                        <h3 class="text-base font-semibold text-white">Recent Users</h3>
                        <a href="{{ route('admin.users') }}" class="text-orange hover:text-orange-400 text-sm transition">View All →</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-700 bg-gray-900/40">
                                    <th class="text-left py-2.5 px-4 text-gray-400 text-xs font-medium uppercase">Name</th>
                                    <th class="text-left py-2.5 px-4 text-gray-400 text-xs font-medium uppercase hidden sm:table-cell">Email</th>
                                    <th class="text-left py-2.5 px-4 text-gray-400 text-xs font-medium uppercase">Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentUsers as $user)
                                <tr class="border-b border-gray-700/50 hover:bg-gray-700/30">
                                    <td class="py-3 px-4">
                                        <p class="text-white text-sm font-medium truncate max-w-[120px] lg:max-w-none">{{ $user->name }}</p>
                                        <p class="text-gray-500 text-xs sm:hidden truncate max-w-[120px]">{{ $user->email }}</p>
                                    </td>
                                    <td class="py-3 px-4 text-gray-400 text-sm hidden sm:table-cell">
                                        <span class="truncate block max-w-[180px]">{{ $user->email }}</span>
                                    </td>
                                    <td class="py-3 px-4 text-gray-500 text-sm whitespace-nowrap">{{ $user->created_at->format('M d') }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="py-8 text-center text-gray-500 text-sm">No users yet</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recent Companies -->
                <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
                    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-700">
                        <h3 class="text-base font-semibold text-white">Recent Companies</h3>
                        <a href="{{ route('admin.companies') }}" class="text-orange hover:text-orange-400 text-sm transition">View All →</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-700 bg-gray-900/40">
                                    <th class="text-left py-2.5 px-4 text-gray-400 text-xs font-medium uppercase">Company</th>
                                    <th class="text-left py-2.5 px-4 text-gray-400 text-xs font-medium uppercase hidden sm:table-cell">Owner</th>
                                    <th class="text-left py-2.5 px-4 text-gray-400 text-xs font-medium uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentCompanies as $company)
                                <tr class="border-b border-gray-700/50 hover:bg-gray-700/30">
                                    <td class="py-3 px-4">
                                        <p class="text-white text-sm font-medium truncate max-w-[130px] lg:max-w-none">{{ $company->company_name }}</p>
                                        <p class="text-gray-500 text-xs sm:hidden">{{ $company->user->name ?? 'N/A' }}</p>
                                    </td>
                                    <td class="py-3 px-4 text-gray-400 text-sm hidden sm:table-cell truncate max-w-[120px]">{{ $company->user->name ?? 'N/A' }}</td>
                                    <td class="py-3 px-4">
                                        <span class="inline-block px-2 py-1 text-xs rounded-full whitespace-nowrap
                                            @if($company->status === 'approved') bg-green-500/20 text-green-400
                                            @elseif($company->status === 'pending') bg-yellow-500/20 text-yellow-400
                                            @elseif($company->status === 'processing') bg-blue-500/20 text-blue-400
                                            @else bg-red-500/20 text-red-400 @endif">
                                            {{ ucfirst($company->status) }}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="py-8 text-center text-gray-500 text-sm">No companies yet</td></tr>
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
