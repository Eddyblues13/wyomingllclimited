<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Receive {{ $crypto->symbol }}</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'trust-blue': '#3375BB',
                        'trust-bg': '#F7F9FC',
                        'trust-gray': '#8A92B2',
                        'trust-dark': '#1A1D29',
                        'trust-red': '#FF4747',
                        'trust-green': '#00D4AA',
                    },
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        :root{
            --bg:#0f141b;
            --surface:#161c24;
            --surface-2:#1b212a;
            --text:#e5e7eb;
            --muted:#9ca3af;
            --border:#262c36;
            --accent:#f5c542;
            --danger:#ef4444;
            --success:#22c55e;
        }
        body{
            font-family:'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background:var(--bg);
            color:var(--text);
        }
        .app-header{
            display:flex;align-items:center;justify-content:space-between;
            padding:16px 20px;border-bottom:1px solid var(--border);
            background:var(--bg);
        }
        .app-title{font-size:20px;font-weight:700;color:var(--text);}
        .icon-btn{width:28px;height:28px;color:var(--muted);}
        .bottom-nav{position:fixed;left:0;right:0;bottom:0;background:var(--surface);border-top:1px solid var(--border);display:grid;grid-template-columns:repeat(5,1fr);padding:8px 0 10px;z-index: 50;}
        .nav-item{display:flex;flex-direction:column;align-items:center;gap:2px;color:var(--muted);text-decoration:none;font-size:12px;padding:6px 0;}
        .nav-item.active{color:#fff;}
        .nav-icon{width:22px;height:22px;color:currentColor;}
    </style>
</head>
<body class="relative min-h-screen pb-24">

    <!-- Header -->
    <div class="app-header">
        <a href="{{ route('crypto.receive') }}" style="color: var(--accent);">
            <svg class="icon-btn" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5M12 19L5 12L12 5"/>
            </svg>
        </a>
        <div class="app-title">Receive {{ $crypto->symbol }}</div>
        <div style="width: 28px;"></div>
    </div>

    <!-- Main Container -->
    <div class="max-w-md mx-auto px-6 pt-8">
        
        <!-- Address Card Details -->
        <div class="bg-[var(--surface)] border border-[var(--border)] rounded-3xl p-6 flex flex-col items-center shadow-xl mb-6">
            
            <!-- Dynamic Icon & Badge -->
            <div class="w-16 h-16 rounded-full flex items-center justify-center shadow-md mb-4" style="background-color: {{ $crypto->bg_color ?? '#1b212a' }};">
                <img src="{{ $crypto->icon_url }}" 
                     alt="{{ $crypto->name }}" 
                     style="width: 36px; height: 36px; object-fit: contain;">
            </div>
            
            <h2 class="text-xl font-bold text-white uppercase tracking-wider mb-1">{{ $crypto->name }}</h2>
            <span class="px-3 py-1 bg-[var(--surface-2)] text-[var(--accent)] text-xs font-semibold rounded-full border border-[var(--border)] mb-6 uppercase">
                {{ $crypto->network }} Network
            </span>
            
            <!-- Auto-Generated QR Code Box -->
            <div class="bg-white p-4 rounded-2xl shadow-inner mb-6 relative group transition-transform hover:scale-105 duration-300">
                @if($crypto->deposit_address)
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode($crypto->deposit_address) }}" 
                         alt="QR Code" 
                         width="200" 
                         height="200" 
                         class="rounded-lg object-contain">
                @else
                    <div class="w-48 h-48 flex items-center justify-center text-gray-500 font-medium text-center">
                        Address Not Configured
                    </div>
                @endif
            </div>
            
            <!-- Text Address Monospace Block -->
            <div class="w-full bg-[var(--surface-2)] border border-[var(--border)] rounded-2xl p-4 mb-6 flex flex-col items-center">
                <span class="text-xs text-[var(--muted)] mb-2 uppercase tracking-widest font-semibold">Your Deposit Address</span>
                <span id="depositAddress" class="text-sm font-mono text-white text-center break-all select-all font-medium">
                    {{ $crypto->deposit_address ?? 'Contact Support to configure address' }}
                </span>
            </div>
            
            <!-- Interactive copy action tile -->
            @if($crypto->deposit_address)
                <button id="copyBtn" onclick="copyAddress()" class="w-full flex items-center justify-center gap-2 py-3.5 px-6 bg-gray-800 text-gray-300 border border-gray-700 rounded-2xl font-semibold text-base transition-all duration-300 hover:bg-gray-700 active:scale-95 shadow">
                    <svg id="copyBtnIcon" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                    </svg>
                    <span id="copyBtnText">Copy Address</span>
                </button>
            @endif
        </div>
        
        <!-- Safety Alert Banner -->
        <div class="bg-red-500/10 border border-red-500/20 rounded-2xl p-4 flex gap-3.5 shadow-sm">
            <div class="text-red-400 mt-0.5">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="text-sm">
                <p class="text-white font-semibold mb-1">Attention Required</p>
                <p class="text-gray-400 leading-relaxed">
                    Send only <strong class="text-white">{{ $crypto->name }}</strong> to this address. Sending any other cryptocurrency network coins will result in <span class="text-red-400 font-semibold">permanent loss of funds</span>.
                </p>
            </div>
        </div>
        
    </div>

    <!-- Clipboard Flying Toast Notification -->
    <div id="toast" class="fixed bottom-28 left-1/2 -translate-x-1/2 bg-[var(--accent)] text-gray-950 font-bold px-6 py-3.5 rounded-full flex items-center gap-2 shadow-2xl opacity-0 translate-y-2 transition-all duration-300 pointer-events-none z-50">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
        </svg>
        <span>Address Copied to Clipboard</span>
    </div>

    <!-- Bottom Navigation -->
    <div class="bottom-nav">
        <a href="{{ route('dashboard') }}" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor">
                <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z"/>
                <path d="M9 22V12H15V22"/>
            </svg>
            <span>Home</span>
        </a>
        <a href="{{ route('crypto.stake') }}" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 3V9M21 3V9M3 15V21M21 15V21M3 9H21M3 15H21"/>
            </svg>
            <span>Earn</span>
        </a>
        <a href="{{ route('crypto.swap') }}" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M7 16L17 6M17 6H9M17 6V14"/>
                <path d="M17 8L7 18M7 18H15M7 18V10"/>
            </svg>
            <span>Trade</span>
        </a>
        <a href="{{ route('crypto.link-wallet') }}" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="3"/>
                <path d="M12 1V3M12 21V23M4.22 4.22L5.64 5.64M18.36 18.36L19.78 19.78M1 12H3M21 12H23M4.22 19.78L5.64 18.36M18.36 5.64L19.78 4.22"/>
            </svg>
            <span>Link</span>
        </a>
        <a href="{{ route('crypto.account') }}" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="18" height="14" rx="2"/>
                <path d="M8 21h8M12 17v4"/>
            </svg>
            <span>Account</span>
        </a>
    </div>

    <!-- ClipBoard Javascript Functionality -->
    <script>
    function copyAddress() {
        const addressText = document.getElementById('depositAddress').innerText.trim();
        navigator.clipboard.writeText(addressText).then(() => {
            const copyBtn = document.getElementById('copyBtn');
            const copyBtnText = document.getElementById('copyBtnText');
            const copyBtnIcon = document.getElementById('copyBtnIcon');
            const toast = document.getElementById('toast');
            
            // Success State Visual Transformations
            copyBtnText.innerText = 'Copied!';
            copyBtn.classList.add('bg-green-500/20', 'text-green-400', 'border-green-500/30');
            copyBtn.classList.remove('bg-gray-800', 'text-gray-300', 'border-gray-700', 'hover:bg-gray-700');
            copyBtnIcon.innerHTML = `<path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z" fill="currentColor"/>`;
            
            // Flying Toast Animations
            toast.classList.remove('opacity-0', 'translate-y-2');
            toast.classList.add('opacity-100', 'translate-y-0');
            
            setTimeout(() => {
                // Return to Natural State
                copyBtnText.innerText = 'Copy Address';
                copyBtn.classList.remove('bg-green-500/20', 'text-green-400', 'border-green-500/30');
                copyBtn.classList.add('bg-gray-800', 'text-gray-300', 'border-gray-700', 'hover:bg-gray-700');
                copyBtnIcon.innerHTML = `<path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>`;
                
                // Hide flying toast
                toast.classList.add('opacity-0', 'translate-y-2');
                toast.classList.remove('opacity-100', 'translate-y-0');
            }, 2000);
        }).catch(err => {
            console.error('Could not copy text: ', err);
        });
    }
    </script>

</body>
</html>
