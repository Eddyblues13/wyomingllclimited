<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Existing Company - Wyoming LLC Attorney</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: { colors: { 'navy': '#1e3a8a', 'orange': '#f97316', 'purple-custom': '#6366f1' } } }
        }
    </script>
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
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-50 min-h-screen" x-data="{ showBanner: true, companyName: '', state: 'Wyoming', firstName: '', lastName: '', email: '', password: '', phone: '', partnerCode: '' }">
    <!-- Top Header -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="/"><img src="{{ asset('logo.webp') }}" alt="Wyoming LLC Attorney" class="h-10 w-auto" /></a>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <span class="text-sm">Feedback</span>
                    </button>
                    <button onclick="window.location.href='/login'" class="text-gray-700 hover:text-gray-900 font-medium transition">Login</button>
                </div>
            </div>
        </div>
    </header>

    <!-- Purple Banner -->
    <div x-show="showBanner" x-transition class="bg-purple-custom text-white py-3 px-4 relative">
        <div class="container mx-auto">
            <div class="flex items-center justify-between">
                <div class="flex-1 text-center lg:text-left">
                    <p class="text-sm lg:text-base">Welcome to our new Intake experience! If you find any issues, please use the <strong>feedback icon above</strong>.</p>
                </div>
                <button @click="showBanner = false" class="ml-4 text-white hover:text-gray-200 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="space-y-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-800">Switch Registered Agent</h1>
                <a href="/new" class="text-blue-600 hover:text-blue-800 text-sm underline">New company? <strong>Form a new company</strong> instead &rarr;</a>
            </div>

            <!-- Info Box -->
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                <div class="flex items-start space-x-4">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-blue-900 mb-1">Already have a company?</h3>
                        <p class="text-blue-800 text-sm">Switch your registered agent to us for better privacy protection, compliance monitoring, and dedicated support. We'll handle the transition seamlessly.</p>
                    </div>
                </div>
            </div>

            <!-- Company Details -->
            <div class="bg-white rounded-xl shadow-sm p-6 lg:p-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Company Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Company Name</label>
                        <input type="text" x-model="companyName" placeholder="Enter existing company name" required class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">State of Formation</label>
                        <select x-model="state" class="w-full p-4 border border-gray-300 rounded-lg text-gray-700 bg-white appearance-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="Wyoming">Wyoming</option><option value="Delaware">Delaware</option><option value="Florida">Florida</option><option value="Texas">Texas</option>
                            <option value="California">California</option><option value="New York">New York</option><option value="Nevada">Nevada</option><option value="New Mexico">New Mexico</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Contact Details -->
            <div class="bg-white rounded-xl shadow-sm p-6 lg:p-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Contact Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">First Name</label><input type="text" x-model="firstName" required class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label><input type="text" x-model="lastName" required class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Email</label><input type="email" x-model="email" required class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></div>
                    <div><label class="block text-sm font-medium text-gray-700 mb-2">Phone</label><input type="tel" x-model="phone" placeholder="(XXX) XXX-XXXX" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <input type="password" x-model="password" id="existing-password-field" placeholder="Create a secure password" required minlength="8" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 pr-12">
                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors" onclick="togglePw('existing-password-field', this)">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Partner Code -->
            <div class="bg-white rounded-xl shadow-sm p-6 lg:p-8">
                <div class="flex items-center space-x-2 mb-4">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    <span class="text-blue-600 font-medium">Have a partner code?</span>
                </div>
                <div class="flex space-x-4">
                    <input type="text" x-model="partnerCode" placeholder="Enter your partner code" class="flex-1 p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-4 rounded-lg font-medium transition-colors">Apply</button>
                </div>
            </div>

            <!-- Submit -->
            <div class="text-center py-8">
                <button type="button" class="bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 text-white px-12 py-4 rounded-lg text-lg font-semibold transition-colors" :disabled="!companyName || !firstName || !lastName || !email || !password">
                    Switch Registered Agent
                </button>
            </div>
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
