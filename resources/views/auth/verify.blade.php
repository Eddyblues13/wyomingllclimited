<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email - Wyoming LLC Attorney</title>
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
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-sm border border-gray-100">
        <div class="text-center">
            <a href="/"><img src="{{ asset('logo.webp') }}" alt="Wyoming LLC Attorney" class="mx-auto h-12 w-auto" /></a>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Verify Your Email</h2>
            <p class="mt-2 text-sm text-gray-600">
                We've sent a 4-digit verification code to<br>
                <span class="font-medium text-navy">{{ session('verification_email') ?? 'your email' }}</span>
            </p>
        </div>

        @if (session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="/verify" method="POST" x-data="{ 
            code: ['', '', '', ''],
            handleInput(index, event) {
                const value = event.target.value;
                if (value.length > 1) {
                    // Handle paste
                    const pastedData = value.substring(0, 4).split('');
                    for (let i = 0; i < pastedData.length; i++) {
                        this.code[i] = pastedData[i];
                        if (i < 3) {
                            this.$refs['input' + (i + 1)].focus();
                        }
                    }
                    event.target.value = this.code[index];
                } else {
                    this.code[index] = value;
                    if (value !== '' && index < 3) {
                        this.$refs['input' + (index + 1)].focus();
                    }
                }
                
                // Update hidden input
                this.$refs.hiddenCode.value = this.code.join('');
            },
            handleKeydown(index, event) {
                if (event.key === 'Backspace' && this.code[index] === '' && index > 0) {
                    this.$refs['input' + (index - 1)].focus();
                }
            }
        }">
            @csrf
            <input type="hidden" name="email" value="{{ session('verification_email') }}">
            <input type="hidden" name="code" x-ref="hiddenCode">

            <div class="flex justify-center gap-4">
                <template x-for="(digit, index) in code" :key="index">
                    <input 
                        type="text" 
                        maxlength="1"
                        class="w-16 h-16 text-center text-2xl font-bold border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white"
                        x-model="code[index]"
                        x-ref="`input${index}`"
                        @input="handleInput(index, $event)"
                        @keydown="handleKeydown(index, $event)"
                        autofocus="index === 0"
                        required
                    >
                </template>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-navy hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    Verify Code
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Didn't receive the code? 
                <form action="/resend-code" method="POST" class="inline">
                    @csrf
                    <input type="hidden" name="email" value="{{ session('verification_email') }}">
                    <button type="submit" class="font-medium text-navy hover:text-blue-800 underline">
                        Resend Code
                    </button>
                </form>
            </p>
        </div>
    </div>
</body>
</html>
