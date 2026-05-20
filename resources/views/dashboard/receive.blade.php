<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Receive Crypto</title>
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
        .search-section{
            background:var(--surface);
            padding:16px 20px;
            border-bottom:1px solid var(--border);
        }
        .search-box{
            background:var(--surface-2);
            border-radius:12px;
            padding:12px 16px;
            display:flex;
            align-items:center;
            gap:8px;
        }
        .search-box input{
            background:transparent;
            border:none;
            outline:none;
            flex:1;
            font-size:16px;
            color:var(--text);
        }
        .search-box input::placeholder{
            color:var(--muted);
        }
        .token-list{
            padding:0 20px 100px;
            background:var(--bg);
        }
        .token-row{
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:16px 0;
            border-bottom:1px solid var(--border);
            cursor:pointer;
            transition:all 0.2s;
            text-decoration:none;
            color:inherit;
        }
        .token-row:last-child{
            border-bottom:none;
        }
        .token-row:hover{
            background-color:var(--surface-2);
            margin:0 -20px;
            padding:16px 20px;
            border-radius:8px;
        }
        .token-left{
            display:flex;
            align-items:center;
            gap:12px;
        }
        .token-icon{
            width:40px;
            height:40px;
            border-radius:20px;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .token-name{
            font-size:16px;
            font-weight:700;
            color:#fff;
            margin-bottom:2px;
            text-transform:none;
        }
        .token-sub{
            font-size:13px;
            color:var(--muted);
        }
        .token-right{
            color:var(--accent);
        }
        .empty-state{
            text-align:center;
            padding:60px 20px;
            color:var(--muted);
        }
        .bottom-nav{position:fixed;left:0;right:0;bottom:0;background:var(--surface);border-top:1px solid var(--border);display:grid;grid-template-columns:repeat(5,1fr);padding:8px 0 10px;z-index: 50;}
        .nav-item{display:flex;flex-direction:column;align-items:center;gap:2px;color:var(--muted);text-decoration:none;font-size:12px;padding:6px 0;}
        .nav-item.active{color:#fff;}
        .nav-icon{width:22px;height:22px;color:currentColor;}
    </style>
</head>
<body>
    <!-- Header -->
    <div class="app-header">
        <a href="{{ route('crypto') }}" style="color: var(--accent);">
            <svg class="icon-btn" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5M12 19L5 12L12 5"/>
            </svg>
        </a>
        <div class="app-title">Receive Crypto</div>
        <div style="width: 28px;"></div>
    </div>

    <!-- Search Section -->
    <div class="search-section">
        <div class="search-box">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" style="color:var(--muted);">
                <circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="2" fill="none"/>
                <path d="M16 16L12 12" stroke="currentColor" stroke-width="2"/>
            </svg>
            <input type="text" placeholder="Search networks" id="searchInput">
        </div>
    </div>

    <!-- Token List -->
    <div class="token-list" id="cryptoList">
        @forelse($cryptos as $crypto)
            <a href="{{ route('crypto.receive.details', ['wallet' => $crypto->name]) }}" 
               class="token-row" 
               data-name="{{ strtolower($crypto->name) }}" 
               data-symbol="{{ strtolower($crypto->data_symbol) }}">
                <div class="token-left">
                    <div class="token-icon" style="background-color: {{ $crypto->bg_color }};">
                        <img src="{{ $crypto->icon_url }}" 
                             alt="{{ $crypto->name }}" 
                             style="width: 24px; height: 24px; object-fit: contain;">
                    </div>
                    <div>
                        <div class="token-name">{{ $crypto->name }}</div>
                        <div class="token-sub">{{ $crypto->network }}</div>
                    </div>
                </div>
                <div class="token-right">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                    </svg>
                </div>
            </a>
        @empty
            <div class="empty-state">
                <i class="ph ph-warning" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                No networks configured yet.
            </div>
        @endforelse
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

    <script>
    const searchInput = document.getElementById('searchInput');
    const cryptoItems = document.querySelectorAll('.token-row');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        cryptoItems.forEach(item => {
            const name = item.dataset.name;
            const symbol = item.dataset.symbol;
            
            if (name.includes(searchTerm) || symbol.includes(searchTerm)) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    });

    cryptoItems.forEach(item => {
        item.addEventListener('touchstart', function() {
            this.style.transform = 'scale(0.98)';
        });
        
        item.addEventListener('touchend', function() {
            this.style.transform = 'scale(1)';
        });
    });
    </script>
</body>
</html>
