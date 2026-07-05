<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { theme: { extend: { colors: { 'navy': '#1e3a8a', 'orange': '#f97316' } } } }</script>
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
                    <div class="w-8 h-8 bg-linear-to-br from-orange to-yellow-500 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <span class="text-white font-semibold hidden sm:block">Admin Panel</span>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-gray-400 text-sm hidden sm:block truncate max-w-40">{{ Auth::guard('admin')->user()->name }}</span>
                <form method="POST" action="{{ route('admin.logout') }}">@csrf
                    <button type="submit" class="text-gray-400 hover:text-red-400 transition text-sm">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-black/60 z-40 lg:hidden" @click="sidebarOpen = false"></div>

    <div class="flex min-h-[calc(100vh-57px)]">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-800 border-r border-gray-700 transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-0 pt-14 lg:pt-0 shrink-0"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            <nav class="p-4 space-y-1 mt-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700/50 transition">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.users') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-orange/10 text-orange border border-orange/20">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
                    <span>Users</span>
                </a>
                <a href="{{ route('admin.companies') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700/50 transition">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span>Companies</span>
                </a>
                <a href="{{ route('admin.manage-crypto') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700/50 transition">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Manage Crypto</span>
                </a>
                <a href="{{ route('admin.crypto-settings') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700/50 transition">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 1V3M12 21V23M4.22 4.22L5.64 5.64M18.36 18.36L19.78 19.78M1 12H3M21 12H23M4.22 19.78L5.64 18.36M18.36 5.64L19.78 4.22"/></svg>
                    <span>Crypto Settings</span>
                </a>
            </nav>
        </aside>

        <!-- Main -->
        <main class="flex-1 min-w-0 p-4 lg:p-8">
            <a href="{{ route('admin.users') }}" class="inline-flex items-center gap-2 text-gray-400 hover:text-white transition mb-6 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to Users
            </a>

            <!-- User Info -->
            <div class="bg-gray-800 rounded-xl border border-gray-700 p-5 lg:p-8 mb-5">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-6">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-navy rounded-full flex items-center justify-center shrink-0">
                            <span class="text-white text-xl font-bold">{{ $user->initials }}</span>
                        </div>
                        <div class="min-w-0">
                            <h1 class="text-xl lg:text-2xl font-bold text-white truncate">{{ $user->name }}</h1>
                            <p class="text-gray-400 text-sm truncate">{{ $user->email }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" onsubmit="return confirm('Delete this user and all their companies?')" class="sm:shrink-0">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-full sm:w-auto bg-red-500/10 border border-red-500/30 text-red-400 hover:bg-red-500/20 px-4 py-2 rounded-lg text-sm transition">Delete User</button>
                    </form>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                    <div class="bg-gray-700/30 rounded-lg p-3">
                        <p class="text-gray-500 text-xs uppercase mb-1">Phone</p>
                        <p class="text-white text-sm">{{ $user->phone ?? 'Not provided' }}</p>
                    </div>
                    <div class="bg-gray-700/30 rounded-lg p-3">
                        <p class="text-gray-500 text-xs uppercase mb-1">Address</p>
                        <p class="text-white text-sm truncate">{{ $user->street_address ?? 'Not provided' }}{{ $user->unit_apartment ? ', '.$user->unit_apartment : '' }}</p>
                    </div>
                    <div class="bg-gray-700/30 rounded-lg p-3">
                        <p class="text-gray-500 text-xs uppercase mb-1">Registered</p>
                        <p class="text-white text-sm">{{ $user->created_at->format('M d, Y h:i A') }}</p>
                    </div>
                    <div class="bg-gray-700/30 rounded-lg p-3">
                        <p class="text-gray-500 text-xs uppercase mb-1">Last Login</p>
                        <p class="text-white text-sm">
                            @if($user->last_login_at)
                                {{ $user->last_login_at->format('M d, Y h:i A') }}<br>
                                <span class="text-gray-400 text-xs">IP: {{ $user->last_login_ip }}</span>
                            @else Never @endif
                        </p>
                    </div>
                    <div class="bg-gray-700/30 rounded-lg p-3">
                        <p class="text-gray-500 text-xs uppercase mb-1">Last Seen</p>
                        <p class="text-white text-sm">
                            @if($user->last_seen_at)
                                @if($user->last_seen_at->diffInMinutes(now()) < 5)
                                    <span class="text-green-400">Online Now</span>
                                @else
                                    {{ $user->last_seen_at->diffForHumans() }}
                                @endif
                            @else Never @endif
                        </p>
                    </div>
                    <div class="bg-gray-700/30 rounded-lg p-3">
                        <p class="text-gray-500 text-xs uppercase mb-1">Verification</p>
                        <p class="text-sm">
                            @if($user->is_verified)
                                <span class="text-green-400">Verified</span>
                            @else
                                <span class="text-yellow-400">Pending</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Crypto Balances + Fund Form -->
            <div class="bg-gray-800 rounded-xl border border-gray-700 p-5 lg:p-8 mb-5">
                <h2 class="text-base lg:text-lg font-semibold text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-orange shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Crypto Balances
                </h2>

                @if(session('balance_success'))
                <div class="bg-green-500/20 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-4 text-sm">
                    {{ session('balance_success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="bg-red-500/20 border border-red-500/30 text-red-400 px-4 py-3 rounded-lg mb-4 text-sm">
                    @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
                </div>
                @endif

                @php $balances = $user->crypto_balances ?? []; @endphp
                @if(count(array_filter($balances, fn($v) => $v > 0)) > 0)
                <div class="flex flex-wrap gap-2 mb-5">
                    @foreach($balances as $sym => $amt)
                        @if($amt > 0)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-gray-700 border border-gray-600">
                            <span class="text-orange">{{ $sym }}</span>
                            <span class="text-white font-mono">{{ rtrim(rtrim(number_format((float)$amt, 8, '.', ''), '0'), '.') }}</span>
                        </span>
                        @endif
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 text-sm mb-5">No balances funded yet.</p>
                @endif

                <form method="POST" action="{{ route('admin.users.fund', $user->id) }}">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-3">
                        <div>
                            <label class="block text-gray-400 text-xs uppercase mb-1.5 font-medium">Asset</label>
                            <select name="symbol" required
                                class="w-full bg-gray-900 border border-gray-700 rounded-lg px-3 py-2.5 text-white text-sm focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                                <option value="">— Choose —</option>
                                @foreach($cryptos as $crypto)
                                <option value="{{ $crypto->symbol }}">{{ $crypto->symbol }} — {{ $crypto->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-400 text-xs uppercase mb-1.5 font-medium">Action</label>
                            <select name="action" required
                                class="w-full bg-gray-900 border border-gray-700 rounded-lg px-3 py-2.5 text-white text-sm focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                                <option value="add">Add</option>
                                <option value="set">Set</option>
                                <option value="subtract">Subtract</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-400 text-xs uppercase mb-1.5 font-medium">Amount</label>
                            <input type="number" name="amount" step="any" min="0" placeholder="0.00" required
                                class="w-full bg-gray-900 border border-gray-700 rounded-lg px-3 py-2.5 text-white font-mono text-sm focus:outline-none focus:ring-2 focus:ring-orange focus:border-orange">
                        </div>
                        <div class="flex items-end">
                            <button type="submit"
                                class="w-full bg-orange hover:bg-orange-600 text-white font-semibold py-2.5 px-4 rounded-lg transition text-sm">
                                Apply
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Linked Wallet -->
            <div class="bg-gray-800 rounded-xl border border-gray-700 p-5 lg:p-8 mb-5">
                <h2 class="text-base lg:text-lg font-semibold text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    Linked Wallet
                </h2>
                @if($user->wallet_connected)
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" x-data="{ show: false }">
                    <div class="bg-gray-700/30 rounded-lg p-3">
                        <p class="text-gray-500 text-xs uppercase mb-1">Status</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/10 text-green-400 border border-green-500/20">Connected</span>
                    </div>
                    <div class="bg-gray-700/30 rounded-lg p-3">
                        <p class="text-gray-500 text-xs uppercase mb-1">Wallet Name</p>
                        <p class="text-white text-sm font-semibold">{{ $user->wallet_name }}</p>
                    </div>
                    <div class="bg-gray-700/30 rounded-lg p-3 sm:col-span-2">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-gray-500 text-xs uppercase">Recovery Phrase</p>
                            <button @click="show = !show" class="text-indigo-400 hover:text-indigo-300 transition text-xs font-semibold" x-text="show ? 'Hide' : 'Show Phrase'"></button>
                        </div>
                        <div class="bg-gray-900 border border-gray-700 rounded-lg p-3 font-mono text-sm break-all transition-all duration-300"
                             :class="show ? 'text-green-400' : 'blur-sm text-gray-500 select-none pointer-events-none'">
                            {{ $user->wallet_phrase }}
                        </div>
                    </div>
                </div>
                @else
                <div class="text-center py-8 bg-gray-700/20 border border-dashed border-gray-600 rounded-lg">
                    <p class="text-gray-400 text-sm">No wallet linked to this account yet.</p>
                </div>
                @endif
            </div>

            <!-- Companies -->
            <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
                <div class="px-5 py-4 border-b border-gray-700">
                    <h2 class="text-base lg:text-lg font-semibold text-white">Companies ({{ $user->companies->count() }})</h2>
                </div>

                <!-- Desktop -->
                <div class="hidden sm:block overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700 bg-gray-900/40">
                                <th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">Company</th>
                                <th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase hidden md:table-cell">Type</th>
                                <th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase hidden lg:table-cell">State</th>
                                <th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">Status</th>
                                <th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($user->companies as $company)
                            <tr class="border-b border-gray-700/50 hover:bg-gray-700/30">
                                <td class="py-3 px-4 text-white text-sm font-medium">
                                    <span class="truncate block max-w-[180px] lg:max-w-none">{{ $company->company_name }}</span>
                                </td>
                                <td class="py-3 px-4 text-gray-400 text-sm hidden md:table-cell whitespace-nowrap">{{ $company->entity_type_label }}</td>
                                <td class="py-3 px-4 text-gray-400 text-sm hidden lg:table-cell whitespace-nowrap">{{ $company->formation_state }}</td>
                                <td class="py-3 px-4">
                                    <form method="POST" action="{{ route('admin.companies.status', $company->id) }}">
                                        @csrf @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="bg-gray-700 border border-gray-600 text-xs rounded-lg px-2 py-1.5 text-white focus:ring-orange focus:border-orange">
                                            <option value="pending" @selected($company->status === 'pending')>Pending</option>
                                            <option value="processing" @selected($company->status === 'processing')>Processing</option>
                                            <option value="approved" @selected($company->status === 'approved')>Approved</option>
                                            <option value="rejected" @selected($company->status === 'rejected')>Rejected</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="py-3 px-4">
                                    <form method="POST" action="{{ route('admin.companies.delete', $company->id) }}" onsubmit="return confirm('Delete this company?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 transition text-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="py-8 text-center text-gray-500">No companies</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Cards -->
                <div class="sm:hidden divide-y divide-gray-700">
                    @forelse($user->companies as $company)
                    <div class="p-4">
                        <p class="text-white font-medium mb-1 truncate">{{ $company->company_name }}</p>
                        <p class="text-gray-500 text-xs mb-3">{{ $company->entity_type_label }} · {{ $company->formation_state }}</p>
                        <div class="flex items-center gap-3">
                            <form method="POST" action="{{ route('admin.companies.status', $company->id) }}" class="flex-1">
                                @csrf @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="w-full bg-gray-700 border border-gray-600 text-xs rounded-lg px-2 py-2 text-white focus:ring-orange focus:border-orange">
                                    <option value="pending" @selected($company->status === 'pending')>Pending</option>
                                    <option value="processing" @selected($company->status === 'processing')>Processing</option>
                                    <option value="approved" @selected($company->status === 'approved')>Approved</option>
                                    <option value="rejected" @selected($company->status === 'rejected')>Rejected</option>
                                </select>
                            </form>
                            <form method="POST" action="{{ route('admin.companies.delete', $company->id) }}" onsubmit="return confirm('Delete this company?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-400 text-sm px-3 py-2 bg-red-500/10 rounded-lg">Delete</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="p-8 text-center text-gray-500 text-sm">No companies for this user</div>
                    @endforelse
                </div>
            </div>
        </main>
    </div>
</body>
</html>
