<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Wyoming LLC Attorney</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { 'navy': '#1e3a8a', 'orange': '#f97316', 'purple-custom': '#6366f1' } } } }
    </script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = '862cd3915db29b95e7f660ce5e0bf234a887c935';
    window.smartsupp||(function(d) {
      var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
      s=d.getElementsByTagName('script')[0];c=d.createElement('script');
      c.type='text/javascript';c.charset='utf-8';c.async=true;
      c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
    })(document);
    </script>
    <noscript>Powered by <a href="https://www.smartsupp.com" target="_blank">Smartsupp</a></noscript>
</head>
<body class="bg-gray-50 min-h-screen" x-data="{ showBanner: true, sidebarOpen: false, activeTab: 'overview' }">
    <!-- Top Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 sm:py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3 sm:space-x-4">
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-600 hover:text-gray-800 p-1">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <a href="/"><img src="{{ asset('logo.webp') }}" alt="Wyoming LLC Attorney" class="h-8 sm:h-10 w-auto" /></a>
                    <div class="hidden sm:block"><h1 class="text-lg sm:text-xl font-semibold text-gray-800">Business Dashboard</h1></div>
                </div>
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-1 sm:space-x-2 text-gray-700 hover:text-gray-900">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 bg-navy rounded-full flex items-center justify-center">
                                <span class="text-white text-xs sm:text-sm font-medium">{{ $user->initials }}</span>
                            </div>
                            <span class="hidden sm:block font-medium text-sm sm:text-base">{{ $user->name }}</span>
                            <svg class="w-3 h-3 sm:w-4 sm:h-4 hidden sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-1 border">
                            <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-gray-50">Sign Out</button></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Purple Banner -->
    <div x-show="showBanner" x-transition class="bg-purple-custom text-white py-3 px-4 relative">
        <div class="container mx-auto">
            <div class="flex items-center justify-between">
                <div class="flex-1 text-center lg:text-left">
                    <p class="text-sm lg:text-base">Welcome back, <strong>{{ $user->name }}!</strong> Manage your LLC applications and track your business formation progress.</p>
                </div>
                <button @click="showBanner = false" class="ml-4 text-white hover:text-gray-200 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden" @click="sidebarOpen = false"></div>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0" :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            <div class="flex flex-col h-full pt-16 lg:pt-4">
                <div class="lg:hidden flex items-center justify-between p-4 border-b">
                    <span class="text-lg font-semibold">Menu</span>
                    <button @click="sidebarOpen = false"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
                </div>
                <nav class="flex-1 px-4 py-6 space-y-2">
                    <button @click="activeTab = 'overview'; sidebarOpen = false" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-left transition-colors" :class="activeTab === 'overview' ? 'bg-blue-50 text-navy border border-blue-200' : 'text-gray-700 hover:bg-gray-50'">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        <span>Overview</span>
                    </button>
                    <button @click="activeTab = 'llc'; sidebarOpen = false" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-left transition-colors" :class="activeTab === 'llc' ? 'bg-blue-50 text-navy border border-blue-200' : 'text-gray-700 hover:bg-gray-50'">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <span>LLC Management</span>
                    </button>
                </nav>
                <div class="p-4 border-t">
                    <div class="text-xs text-gray-500"><p>Wyoming LLC Attorney</p><p>Business Management Platform</p></div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 lg:ml-0 p-6">
            <!-- Overview Tab -->
            <div x-show="activeTab === 'overview'" x-transition>
                <div class="mb-8">
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-2">Welcome back, {{ $user->name }}!</h2>
                    <p class="text-gray-600">Here's your LLC portfolio overview.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white rounded-xl shadow-sm p-4 sm:p-6 border-l-4 border-navy">
                        <div class="flex items-center justify-between">
                            <div class="flex-1"><p class="text-sm font-medium text-gray-600">Total LLCs</p><p class="text-xl sm:text-2xl font-bold text-gray-800">{{ $totalLLCs }}</p><p class="text-xs sm:text-sm text-gray-500 mt-1">Your LLC applications</p></div>
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-navy bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0 ml-3">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-4 sm:p-6 border-l-4 border-green-500">
                        <div class="flex items-center justify-between">
                            <div class="flex-1"><p class="text-sm font-medium text-gray-600">Approved LLCs</p><p class="text-xl sm:text-2xl font-bold text-gray-800">{{ $approvedLLCs }}</p><p class="text-xs sm:text-sm text-green-600 mt-1">Active businesses</p></div>
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-500 bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0 ml-3">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-4 sm:p-6 border-l-4 border-yellow-500">
                        <div class="flex items-center justify-between">
                            <div class="flex-1"><p class="text-sm font-medium text-gray-600">Pending LLCs</p><p class="text-xl sm:text-2xl font-bold text-gray-800">{{ $pendingLLCs }}</p><p class="text-xs sm:text-sm text-yellow-600 mt-1">Under review</p></div>
                            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-yellow-500 bg-opacity-10 rounded-lg flex items-center justify-center flex-shrink-0 ml-3">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent LLCs Table -->
                <div class="bg-white rounded-xl shadow-sm p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 sm:mb-6 space-y-3 sm:space-y-0">
                        <h3 class="text-lg font-semibold text-gray-800">Your LLC Applications</h3>
                        <a href="/new" class="bg-navy hover:bg-blue-800 text-white px-4 py-2 rounded-lg font-medium transition-colors text-center text-sm sm:text-base">Form New LLC</a>
                    </div>
                    <div class="overflow-x-auto -mx-4 sm:mx-0">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="text-left py-3 px-3 sm:px-4 font-medium text-gray-600 text-sm">Company Name</th>
                                    <th class="text-left py-3 px-3 sm:px-4 font-medium text-gray-600 text-sm hidden sm:table-cell">Entity Type</th>
                                    <th class="text-left py-3 px-3 sm:px-4 font-medium text-gray-600 text-sm hidden md:table-cell">State</th>
                                    <th class="text-left py-3 px-3 sm:px-4 font-medium text-gray-600 text-sm">Status</th>
                                    <th class="text-left py-3 px-3 sm:px-4 font-medium text-gray-600 text-sm hidden lg:table-cell">Applied</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($companies as $company)
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 font-medium text-gray-800 text-sm sm:text-base">
                                        <div class="max-w-xs truncate">{{ $company->company_name }}</div>
                                        <div class="sm:hidden text-xs text-gray-500 mt-1">{{ $company->entity_type_label }} &bull; {{ $company->formation_state }}</div>
                                    </td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 text-gray-600 text-sm hidden sm:table-cell">{{ $company->entity_type_label }}</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 text-gray-600 text-sm hidden md:table-cell">{{ $company->formation_state }}</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4">
                                        @php $sc = $company->status_color; @endphp
                                        <span class="inline-block px-2 py-1 text-xs rounded-full bg-{{ $sc }}-100 text-{{ $sc }}-800">{{ ucfirst($company->status) }}</span>
                                        <div class="lg:hidden text-xs text-gray-500 mt-1">{{ $company->created_at->format('M d, Y') }}</div>
                                    </td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 text-gray-600 text-sm hidden lg:table-cell">{{ $company->created_at->format('M d, Y') }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="py-8 text-center text-gray-500">No LLC applications yet. <a href="/new" class="text-blue-600 hover:underline">Form your first LLC</a></td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- LLC Management Tab -->
            <div x-show="activeTab === 'llc'" x-transition>
                <div class="mb-6 sm:mb-8">
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mb-2">LLC Management</h2>
                    <p class="text-gray-600 text-sm sm:text-base">Manage and track all your Limited Liability Companies.</p>
                </div>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6 mb-6 sm:mb-8">
                    <div class="bg-white rounded-lg sm:rounded-xl shadow-sm p-3 sm:p-4 lg:p-6">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:space-x-3 space-y-2 lg:space-y-0">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto lg:mx-0"><svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                            <div class="text-center lg:text-left"><p class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-800">{{ $approvedLLCs }}</p><p class="text-xs sm:text-sm text-gray-600">Approved</p></div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg sm:rounded-xl shadow-sm p-3 sm:p-4 lg:p-6">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:space-x-3 space-y-2 lg:space-y-0">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 bg-yellow-100 rounded-lg flex items-center justify-center mx-auto lg:mx-0"><svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                            <div class="text-center lg:text-left"><p class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-800">{{ $pendingLLCs }}</p><p class="text-xs sm:text-sm text-gray-600">Pending</p></div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg sm:rounded-xl shadow-sm p-3 sm:p-4 lg:p-6">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:space-x-3 space-y-2 lg:space-y-0">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto lg:mx-0"><svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                            <div class="text-center lg:text-left"><p class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-800">{{ $processingLLCs }}</p><p class="text-xs sm:text-sm text-gray-600">Processing</p></div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg sm:rounded-xl shadow-sm p-3 sm:p-4 lg:p-6">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:space-x-3 space-y-2 lg:space-y-0">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 bg-red-100 rounded-lg flex items-center justify-center mx-auto lg:mx-0"><svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg></div>
                            <div class="text-center lg:text-left"><p class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-800">{{ $rejectedLLCs }}</p><p class="text-xs sm:text-sm text-gray-600">Rejected</p></div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 sm:mb-6 space-y-3 sm:space-y-0">
                        <h3 class="text-lg font-semibold text-gray-800">All Your LLCs</h3>
                        <a href="/new" class="bg-navy hover:bg-blue-800 text-white px-4 py-2 rounded-lg font-medium transition-colors text-center text-sm sm:text-base">Form New LLC</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead><tr class="border-b border-gray-200"><th class="text-left py-3 px-4 font-medium text-gray-600">Company Name</th><th class="text-left py-3 px-4 font-medium text-gray-600">Entity Type</th><th class="text-left py-3 px-4 font-medium text-gray-600">State</th><th class="text-left py-3 px-4 font-medium text-gray-600">Status</th><th class="text-left py-3 px-4 font-medium text-gray-600">Application Date</th><th class="text-left py-3 px-4 font-medium text-gray-600">State Fee</th></tr></thead>
                            <tbody>
                                @forelse($companies as $company)
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="py-4 px-4 font-medium text-gray-800">{{ $company->company_name }}</td>
                                    <td class="py-4 px-4 text-gray-600">{{ $company->entity_type_label }}</td>
                                    <td class="py-4 px-4 text-gray-600">{{ $company->formation_state }}</td>
                                    <td class="py-4 px-4">
                                        @php $sc = $company->status_color; @endphp
                                        <span class="inline-block px-2 py-1 text-xs rounded-full bg-{{ $sc }}-100 text-{{ $sc }}-800">{{ ucfirst($company->status) }}</span>
                                    </td>
                                    <td class="py-4 px-4 text-gray-600">{{ $company->created_at->format('M d, Y') }}</td>
                                    <td class="py-4 px-4 text-gray-600">${{ number_format($company->state_fee, 2) }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="6" class="py-8 text-center text-gray-500">No LLCs found. <a href="/new" class="text-blue-600 hover:underline">Form your first LLC</a></td></tr>
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
