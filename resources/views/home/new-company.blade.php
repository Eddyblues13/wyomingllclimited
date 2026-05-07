<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Company Formation - Wyoming LLC Attorney</title>
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
    <script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('formApp', () => ({
            showBanner: true,
            formationState: 'Wyoming',
            entityType: '',
            companyName: '',
            businessEnding: 'Prefer No Ending',
            firstName: '',
            lastName: '',
            email: '',
            password: '',
            phone: '',
            address: '',
            unit: '',
            city: '',
            country: '',
            postalCode: '',
            partnerCode: '',
            selectedCountry: 'US',
            countries: [
                { code: 'US', name: 'United States', dial_code: '+1', flag: '\uD83C\uDDFA\uD83C\uDDF8', placeholder: '(XXX) XXX-XXXX' },
                { code: 'GB', name: 'United Kingdom', dial_code: '+44', flag: '\uD83C\uDDEC\uD83C\uDDE7', placeholder: 'XXXXX XXXXXX' },
                { code: 'CA', name: 'Canada', dial_code: '+1', flag: '\uD83C\uDDE8\uD83C\uDDE6', placeholder: '(XXX) XXX-XXXX' },
                { code: 'DE', name: 'Germany', dial_code: '+49', flag: '\uD83C\uDDE9\uD83C\uDDEA', placeholder: 'XXXX XXXXXXX' },
                { code: 'AU', name: 'Australia', dial_code: '+61', flag: '\uD83C\uDDE6\uD83C\uDDFA', placeholder: 'XXXX XXX XXX' },
                { code: 'FR', name: 'France', dial_code: '+33', flag: '\uD83C\uDDEB\uD83C\uDDF7', placeholder: 'XX XX XX XX XX' },
                { code: 'IN', name: 'India', dial_code: '+91', flag: '\uD83C\uDDEE\uD83C\uDDF3', placeholder: 'XXXXX XXXXX' },
                { code: 'JP', name: 'Japan', dial_code: '+81', flag: '\uD83C\uDDEF\uD83C\uDDF5', placeholder: 'XXX XXXX XXXX' },
                { code: 'BR', name: 'Brazil', dial_code: '+55', flag: '\uD83C\uDDE7\uD83C\uDDF7', placeholder: '(XX) XXXX-XXXX' },
                { code: 'MX', name: 'Mexico', dial_code: '+52', flag: '\uD83C\uDDF2\uD83C\uDDFD', placeholder: 'XXX XXX XXXX' },
                { code: 'AE', name: 'UAE', dial_code: '+971', flag: '\uD83C\uDDE6\uD83C\uDDEA', placeholder: 'XX XXX XXXX' },
                { code: 'SG', name: 'Singapore', dial_code: '+65', flag: '\uD83C\uDDF8\uD83C\uDDEC', placeholder: 'XXXX XXXX' },
                { code: 'NG', name: 'Nigeria', dial_code: '+234', flag: '\uD83C\uDDF3\uD83C\uDDEC', placeholder: 'XXX XXX XXXX' },
                { code: 'ZA', name: 'South Africa', dial_code: '+27', flag: '\uD83C\uDDFF\uD83C\uDDE6', placeholder: 'XX XXX XXXX' },
                { code: 'NZ', name: 'New Zealand', dial_code: '+64', flag: '\uD83C\uDDF3\uD83C\uDDFF', placeholder: 'XX XXX XXXX' },
            ],
            getPhonePlaceholder() {
                const c = this.countries.find(x => x.code === this.selectedCountry);
                return c ? c.placeholder : 'XXXXXXXXX';
            },
            async submitForm() {
                const submitBtn = document.getElementById('submitBtn');
                const submitText = submitBtn.querySelector('.submit-text');
                const loadingSpinner = submitBtn.querySelector('.loading-spinner');
                const errorMsg = document.getElementById('error-message');
                const successMsg = document.getElementById('success-message');
                errorMsg.classList.add('hidden');
                successMsg.classList.add('hidden');
                if (!this.entityType) { errorMsg.textContent = 'Please select an entity type'; errorMsg.classList.remove('hidden'); return; }
                if (!this.companyName) { errorMsg.textContent = 'Please enter a company name'; errorMsg.classList.remove('hidden'); return; }
                if (!this.firstName) { errorMsg.textContent = 'Please enter your first name'; errorMsg.classList.remove('hidden'); return; }
                if (!this.lastName) { errorMsg.textContent = 'Please enter your last name'; errorMsg.classList.remove('hidden'); return; }
                if (!this.email) { errorMsg.textContent = 'Please enter your email'; errorMsg.classList.remove('hidden'); return; }
                if (!this.password || this.password.length < 8) { errorMsg.textContent = 'Password must be at least 8 characters'; errorMsg.classList.remove('hidden'); return; }
                submitBtn.disabled = true;
                submitText.textContent = 'Submitting...';
                loadingSpinner.classList.remove('hidden');
                try {
                    const formData = new FormData();
                    formData.append('formationState', this.formationState);
                    formData.append('entityType', this.entityType);
                    formData.append('companyName', this.companyName);
                    formData.append('businessEnding', this.businessEnding);
                    formData.append('firstName', this.firstName);
                    formData.append('lastName', this.lastName);
                    formData.append('email', this.email);
                    formData.append('password', this.password);
                    formData.append('phone', this.phone || '');
                    formData.append('streetAddress', this.address || '');
                    formData.append('unitApartment', this.unit || '');
                    formData.append('city', this.city || '');
                    formData.append('country', this.country || '');
                    formData.append('postalCode', this.postalCode || '');
                    formData.append('partnerCode', this.partnerCode || '');
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    const response = await fetch('/api/register-company', {
                        method: 'POST',
                        headers: { 'X-Requested-With': 'XMLHttpRequest', 'X-CSRF-TOKEN': csrfToken },
                        body: formData
                    });
                    const responseText = await response.text();
                    let result;
                    try { result = JSON.parse(responseText); } catch (e) { throw new Error('Server returned invalid response'); }
                    if (result.success) {
                        successMsg.textContent = result.message;
                        successMsg.classList.remove('hidden');
                        setTimeout(() => { window.location.href = result.redirect || '/dashboard'; }, 2000);
                    } else { throw new Error(result.error || 'An error occurred'); }
                } catch (error) {
                    errorMsg.textContent = error.message;
                    errorMsg.classList.remove('hidden');
                    submitBtn.disabled = false;
                    submitText.textContent = 'Submit Application';
                    loadingSpinner.classList.add('hidden');
                }
            }
        }));
    });
    </script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-50 min-h-screen" x-data="formApp">
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
                    <p class="text-sm lg:text-base">
                        Welcome to our new Intake experience! If you find any issues, please use the 
                        <strong>feedback icon above</strong>. 
                        <strong>Be the first to report a validated bug</strong> and we'll refund your entire formation fee!
                    </p>
                </div>
                <button @click="showBanner = false" class="ml-4 text-white hover:text-gray-200 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="space-y-8">
            <!-- Page Header -->
            <div class="flex items-center justify-between flex-wrap gap-4">
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-800">Company Formation</h1>
                <a href="/existing" class="text-blue-600 hover:text-blue-800 text-sm underline">
                    Existing company? Switch <strong>REGISTERED AGENTS</strong> to us &rarr;
                </a>
            </div>

            <!-- Formation State Section -->
            <div class="bg-white rounded-xl shadow-sm p-6 lg:p-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Formation State</h2>
                <div class="relative">
                    <select x-model="formationState" class="w-full p-4 border border-gray-300 rounded-lg text-gray-700 bg-white appearance-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="Wyoming" selected>Wyoming</option>
                        <option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option>
                        <option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option>
                        <option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option>
                        <option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option>
                        <option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option>
                        <option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option>
                        <option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option>
                        <option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option>
                        <option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option>
                        <option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Rhode Island">Rhode Island</option>
                        <option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option>
                        <option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Washington">Washington</option>
                        <option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>
            <!-- Entity Type Section -->
            <div class="bg-white rounded-xl shadow-sm p-6 lg:p-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Entity Type</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="border-2 border-gray-200 rounded-xl p-6 hover:border-blue-500 cursor-pointer transition-colors" :class="entityType === 'llc' ? 'border-blue-500 bg-blue-50' : ''" @click="entityType = 'llc'">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Limited Liability Company (LLC)</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">Flexible business structure with simplified management and tax benefits. Perfect for small to medium businesses.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-2 border-gray-200 rounded-xl p-6 hover:border-blue-500 cursor-pointer transition-colors" :class="entityType === 'corp' ? 'border-blue-500 bg-blue-50' : ''" @click="entityType = 'corp'">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Corporation (C-CORP)</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">Traditional business structure ideal for raising capital, going public, and scaling operations globally.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-2 border-gray-200 rounded-xl p-6 hover:border-blue-500 cursor-pointer transition-colors" :class="entityType === 'close-llc' ? 'border-blue-500 bg-blue-50' : ''" @click="entityType = 'close-llc'">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Close LLC</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">Unique to Wyoming and provides the same asset protection, tax and privacy benefits as a regular LLC. If you are the only owner, or this is a family business, then we generally recommend a Close LLC since they have reduced requirements.</p>
                            </div>
                        </div>
                    </div>
                    <div class="border-2 border-gray-200 rounded-xl p-6 hover:border-blue-500 cursor-pointer transition-colors" :class="entityType === 'close-corp' ? 'border-blue-500 bg-blue-50' : ''" @click="entityType = 'close-corp'">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Close Corporation</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">Same asset protection, privacy and tax features as a Corporation, but with less maintenance.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Company Name Section -->
            <div class="bg-white rounded-xl shadow-sm p-6 lg:p-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Company Name</h2>
                <div class="space-y-4">
                    <div>
                        <input type="text" x-model="companyName" placeholder="Enter your company name" required class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Business Ending</label>
                        <div class="relative">
                            <select x-model="businessEnding" class="w-full p-4 border border-gray-300 rounded-lg text-gray-700 bg-white appearance-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="Prefer No Ending">Prefer No Ending</option>
                                <option value="LLC">LLC</option>
                                <option value="Limited Liability Company">Limited Liability Company</option>
                                <option value="Corp">Corp</option>
                                <option value="Corporation">Corporation</option>
                                <option value="Inc">Inc</option>
                                <option value="Incorporated">Incorporated</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Privacy Protection Section -->
            <div class="bg-white rounded-xl shadow-sm p-6 lg:p-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Privacy Protection</h2>
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-5 h-5 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-blue-800 text-sm">Your registered agent address will appear on public records instead of your personal address.</p>
                    </div>
                </div>
            </div>

            <!-- Contact Details Section -->
            <div class="bg-white rounded-xl shadow-sm p-6 lg:p-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Contact Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                        <input type="text" x-model="firstName" required class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                        <input type="text" x-model="lastName" required class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" x-model="email" required class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                        <div class="flex">
                            <div class="relative">
                                <select x-model="selectedCountry" class="flex items-center px-3 py-4 border border-r-0 border-gray-300 rounded-l-lg bg-gray-50 appearance-none pr-8 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <template x-for="c in countries" :key="c.code">
                                        <option :value="c.code" :selected="c.code === selectedCountry" x-text="c.flag + ' ' + c.dial_code"></option>
                                    </template>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                            <input type="tel" x-model="phone" :placeholder="getPhonePlaceholder()" class="flex-1 p-4 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <input type="password" x-model="password" id="new-password-field" placeholder="Create a secure password" required minlength="8" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 pr-12">
                            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors" onclick="togglePw('new-password-field', this)">
                                <svg class="w-5 h-5 eye-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center space-x-2 text-sm text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span>This information will not be made public.</span>
                </div>
            </div>
            <!-- Contact Address Section -->
            <div class="bg-white rounded-xl shadow-sm p-6 lg:p-8">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Contact Address</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Street Address</label>
                        <input type="text" x-model="address" placeholder="Start typing address for suggestions..." class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <p class="text-xs text-gray-500 mt-1">Enter your street address including building number</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Unit/Apartment (Optional)</label>
                            <input type="text" x-model="unit" placeholder="Apt, Suite, Unit, etc." class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
                            <input type="text" x-model="city" placeholder="Enter city" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Country *</label>
                            <div class="relative">
                                <select x-model="country" class="w-full p-4 border border-gray-300 rounded-lg text-gray-700 bg-white appearance-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select country</option>
                                    <template x-for="c in countries" :key="c.code">
                                        <option :value="c.code" x-text="c.flag + ' ' + c.name"></option>
                                    </template>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Postal Code</label>
                            <input type="text" x-model="postalCode" placeholder="Enter postal code" class="w-full p-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center space-x-2 text-sm text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <span>This address information is for our internal records only and will remain private.</span>
                </div>
            </div>

            <!-- Partner Code Section -->
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

            <!-- Error/Success Messages -->
            <div id="error-message" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4"></div>
            <div id="success-message" class="hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"></div>

            <!-- Submit Button -->
            <div class="text-center py-8">
                <button type="button" id="submitBtn" class="bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 text-white px-12 py-4 rounded-lg text-lg font-semibold transition-colors" :disabled="!entityType || !companyName || !firstName || !lastName || !email || !password" @click="submitForm()">
                    <span class="submit-text">Submit Application</span>
                    <div class="loading-spinner hidden inline-block ml-2">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const error = urlParams.get('error');
            if (error) {
                const errorMessage = document.getElementById('error-message');
                errorMessage.textContent = decodeURIComponent(error);
                errorMessage.classList.remove('hidden');
            }
        });

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
