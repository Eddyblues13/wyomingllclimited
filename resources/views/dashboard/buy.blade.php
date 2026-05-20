<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Buy Crypto - web3Port</title>
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

        .panel{
            position:fixed;
            left:0;
            right:0;
            bottom:0;
            background:var(--surface);
            border-top:1px solid var(--border);
            padding:14px 20px calc(14px + env(safe-area-inset-bottom));
            backdrop-filter: blur(12px);
            z-index:90;
        }

        .token.selected {
            border-color: var(--accent) !important;
            box-shadow: 0 0 14px rgba(245, 197, 66, 0.1);
            background: rgba(255, 255, 255, 0.02);
        }
        .token.selected .right-label {
            color: var(--accent) !important;
        }

        .cta {
            width: 100%;
            background: var(--accent);
            color: #0b1220;
            border: none;
            border-radius: 12px;
            padding: 14px 24px;
            font-weight: 800;
            font-size: 14px;
            letter-spacing: .2px;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .cta:hover:not(:disabled) {
            background: #dca51a;
            box-shadow: 0 4px 14px rgba(245, 197, 66, 0.2);
        }
        .cta:active:not(:disabled) {
            transform: scale(0.98);
        }
        .cta:disabled {
            background: var(--border);
            color: var(--muted);
            opacity: .6;
            cursor: not-allowed;
        }
    </style>
</head>
<body class="pb-36">
    <!-- Header -->
    <div class="wallet-header">
        <svg onclick="window.location.href='/crypto'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:28px;height:28px;color:var(--muted);cursor:pointer;transition:.2s;" class="hover:text-white">
            <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
        <div style="font-size:20px;font-weight:700;color:var(--text);">Buy Crypto</div>
        <div style="width:28px;"></div>
    </div>

    <div class="w-full max-w-xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 md:mt-8">
        <div class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2.5">Select a token</div>
        
        <!-- Search -->
        <div class="search relative flex items-center mb-6">
            <i class="ph-bold ph-magnifying-glass absolute left-4 text-gray-500 text-lg"></i>
            <input id="search" type="text" placeholder="Search token (e.g., BTC, ETH)" class="w-full bg-gray-950/40 border border-gray-800/80 rounded-xl py-3.5 pl-11 pr-4 text-sm text-white placeholder-gray-600 focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent/20 transition duration-200" />
        </div>

        <!-- Token Grid -->
        <div id="tokenGrid" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Dynamic tokens loaded by JS -->
        </div>

        <div class="flex items-center space-x-2 bg-gray-950/20 border border-gray-900 rounded-xl p-3.5 mt-6">
            <i class="ph-fill ph-info text-accent text-lg flex-shrink-0"></i>
            <span class="text-xs text-gray-400 leading-relaxed">You will be securely redirected to Simplex checkout services to complete your purchase using your credit card or bank transfer.</span>
        </div>
    </div>

    <!-- Purchase Panel -->
    <div class="panel">
        <div class="w-full max-w-xl mx-auto grid grid-cols-1 sm:grid-cols-[1fr_auto] gap-4 items-center">
            <div class="space-y-1.5 flex-1">
                <div class="amount-wrap flex items-center bg-gray-950/60 border border-gray-800/80 rounded-xl p-1 focus-within:border-accent transition-colors">
                    <div class="flex-shrink-0 pl-3.5 pr-2 font-bold text-gray-500 text-xs uppercase tracking-wider select-none">Buy</div>
                    <input id="amount" type="number" min="50" step="10" value="150" placeholder="Amount" class="flex-1 bg-transparent border-0 py-2.5 px-1.5 text-sm sm:text-base text-white focus:outline-none focus:ring-0 font-semibold font-mono" />
                    <select id="fiat" class="bg-gray-900 border border-gray-800 rounded-lg py-1.5 px-3 text-xs sm:text-sm text-white font-bold focus:outline-none focus:ring-0 mr-1 cursor-pointer">
                        <option value="USD" selected>USD</option>
                        <option value="EUR">EUR</option>
                    </select>
                </div>
                <!-- Validation Hint -->
                <div id="validationHint" class="text-[10px] text-gray-500 font-medium pl-1 flex items-center gap-1">
                    <i class="ph-bold ph-warning text-xs"></i>
                    <span>Simplex checkout minimum: 50 USD/EUR</span>
                </div>
            </div>
            
            <button id="continueBtn" class="cta" disabled>
                <span>Continue</span>
                <i class="ph-bold ph-arrow-right"></i>
            </button>
        </div>
    </div>

    <!-- Bottom Navigation (Overlay Spacing) -->
    <div class="bottom-nav opacity-0 pointer-events-none">
        <a href="#" class="nav-item"><svg class="nav-icon" viewBox="0 0 24 24"></svg></a>
    </div>

    <!-- JS Logic -->
    <script>
        const TOKENS = [
            { symbol:'BTC', name:'Bitcoin', icon:'https://assets.coingecko.com/coins/images/1/large/bitcoin.png', color:'#F7931A' },
            { symbol:'ETH', name:'Ethereum', icon:'https://assets.coingecko.com/coins/images/279/large/ethereum.png', color:'#627EEA' },
            { symbol:'BNB', name:'BNB Smart Chain', icon:'https://assets.coingecko.com/coins/images/825/large/binance-coin-logo.png', color:'#F3BA2F' },
            { symbol:'XRP', name:'Ripple', icon:'https://assets.coingecko.com/coins/images/44/large/xrp.png', color:'#23292F' },
            { symbol:'XLM', name:'Stellar', icon:'https://assets.coingecko.com/coins/images/100/large/Stellar_symbol_black_RGB.png', color:'#14B6E7' },
            { symbol:'LTC', name:'Litecoin', icon:'https://assets.coingecko.com/coins/images/2/large/litecoin.png', color:'#BFBBBB' },
            { symbol:'DOGE', name:'Dogecoin', icon:'https://assets.coingecko.com/coins/images/5/large/dogecoin.png', color:'#C2A633' },
            { symbol:'USDT', name:'Tether USDt', icon:'https://assets.coingecko.com/coins/images/325/large/Tether-logo.png', color:'#26A17B' }
        ];

        const grid = document.getElementById('tokenGrid');
        const search = document.getElementById('search');
        const amount = document.getElementById('amount');
        const fiat = document.getElementById('fiat');
        const btn = document.getElementById('continueBtn');
        const validationHint = document.getElementById('validationHint');
        let selected = null;

        function render(list){
            grid.innerHTML = '';
            list.forEach(t => {
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'token glass-panel hover:bg-white/5 rounded-2xl p-4 flex items-center justify-between text-left transition-all duration-300 border border-gray-800/80 hover:border-accent hover:shadow-lg hover:shadow-accent/5 active:scale-[0.98] group relative overflow-hidden focus:outline-none focus:ring-2 focus:ring-accent/25';
                
                // Keep selected class active if matches
                if (selected && selected.symbol === t.symbol) {
                    button.classList.add('selected');
                }

                button.innerHTML = `
                    <div class="left flex items-center space-x-4 min-w-0">
                        <div class="icon w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0" style="background:${t.color}15; border: 1px solid ${t.color}25">
                            <img src="${t.icon}" alt="${t.symbol}" class="w-6 h-6 object-contain group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="name min-w-0">
                            <div class="symbol font-bold text-sm sm:text-base text-white truncate">${t.symbol}</div>
                            <div class="fullname text-xs text-gray-500 mt-0.5 truncate">${t.name}</div>
                        </div>
                    </div>
                    <div class="right-label text-xs font-bold text-gray-500 group-hover:text-accent transition-colors duration-200 flex items-center space-x-1.5">
                        <span>${selected && selected.symbol === t.symbol ? 'Selected' : 'Select'}</span>
                        <i class="ph-bold ph-caret-right"></i>
                    </div>
                `;

                button.addEventListener('click', () => {
                    selected = t;
                    // Remove selected classes
                    [...grid.children].forEach(c => {
                        c.classList.remove('selected');
                        const rightLabel = c.querySelector('.right-label span');
                        if (rightLabel) rightLabel.innerText = 'Select';
                    });
                    
                    button.classList.add('selected');
                    const span = button.querySelector('.right-label span');
                    if (span) span.innerText = 'Selected';

                    validateInputs();
                });
                grid.appendChild(button);
            });
        }

        function validateInputs(){
            const val = Number(amount.value);
            const currency = fiat.value;
            
            let isValid = true;

            if (!selected) {
                isValid = false;
                validationHint.innerHTML = `<i class="ph-bold ph-warning text-xs"></i> <span>Please select a token to purchase</span>`;
                validationHint.className = "text-[10px] text-accent font-medium pl-1 flex items-center gap-1";
            } else if (Number.isNaN(val) || val < 50) {
                isValid = false;
                validationHint.innerHTML = `<i class="ph-bold ph-warning text-xs"></i> <span>Simplex minimum amount is 50 ${currency}</span>`;
                validationHint.className = "text-[10px] text-danger font-medium pl-1 flex items-center gap-1";
            } else {
                validationHint.innerHTML = `<i class="ph-bold ph-check text-xs"></i> <span>Ready to buy ${selected.symbol} with ${currency}</span>`;
                validationHint.className = "text-[10px] text-success font-medium pl-1 flex items-center gap-1";
            }

            btn.disabled = !isValid;
        }

        btn.addEventListener('click', () => {
            const val = Number(amount.value);
            if(!selected || Number.isNaN(val) || val < 50) return;
            const url = `https://buy.simplex.com/?crypto=${encodeURIComponent(selected.symbol)}&fiat=${encodeURIComponent(fiat.value)}&amount=${encodeURIComponent(amount.value)}`;
            window.location.href = url;
        });

        search.addEventListener('input', () => {
            const q = search.value.trim().toLowerCase();
            const filtered = TOKENS.filter(t => t.symbol.toLowerCase().includes(q) || t.name.toLowerCase().includes(q));
            render(filtered);
        });

        amount.addEventListener('input', validateInputs);
        fiat.addEventListener('change', validateInputs);

        // Run initial render & check
        render(TOKENS);
        validateInputs();
    </script>
</body>
</html>
