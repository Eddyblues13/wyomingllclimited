<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/images/logo.png" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Swap Crypto</title>
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
            margin:0;
            padding:0;
        }
        
        .app-header{
            display:flex;align-items:center;justify-content:space-between;
            padding:16px 20px;border-bottom:1px solid var(--border);
            background:var(--bg);position:sticky;top:0;z-index:50;
            backdrop-filter:blur(10px);
        }
        .app-title{font-size:20px;font-weight:700;color:var(--text);}
        .icon-btn{width:28px;height:28px;color:var(--muted);cursor:pointer;}
        
        .swap-container {
            background: var(--surface);
            border-radius: 16px;
            padding: 24px 20px;
            margin: 16px 20px;
            border: 1px solid var(--border);
        }
        
        .crypto-select-card {
            background: var(--surface-2);
            border-radius: 12px;
            padding: 16px;
            border: 1px solid var(--border);
            transition: all 0.2s;
        }
        
        .crypto-select-card:focus-within {
            border-color: var(--accent);
            background: var(--bg);
        }
        
        .crypto-select {
            background: transparent;
            border: none;
            outline: none;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            color: var(--text);
            appearance: none;
            padding-right: 24px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%239ca3af'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right center;
            background-size: 20px;
            cursor:pointer;
        }
        
        .amount-input {
            background: transparent;
            border: none;
            outline: none;
            width: 100%;
            text-align: right;
            font-size: 24px;
            font-weight: 600;
            color: var(--text);
        }
        
        .amount-input::placeholder {
            color: var(--muted);
        }
        
        .percentage-btn {
            background: var(--surface-2);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .percentage-btn:hover {
            background: var(--accent);
            color: var(--bg);
            border-color: var(--accent);
        }
        
        .swap-button {
            background: var(--accent);
            color: var(--bg);
            border: none;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            margin: 0 auto;
        }
        
        .swap-button:hover {
            opacity: 0.8;
            transform: rotate(180deg);
        }
        
        .submit-button {
            width: 100%;
            background: var(--accent);
            color: var(--bg);
            border: none;
            border-radius: 12px;
            padding: 16px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 24px;
        }
        
        .submit-button:hover:not(:disabled) {
            opacity: 0.8;
        }
        
        .submit-button:disabled {
            background: var(--border);
            color: var(--muted);
            cursor: not-allowed;
        }
        
        .estimated-info {
            background: var(--surface-2);
            border-radius: 12px;
            padding: 16px;
            margin-top: 16px;
            border: 1px solid var(--border);
        }
        
        .bottom-nav{position:fixed;left:0;right:0;bottom:0;background:var(--surface);border-top:1px solid var(--border);display:grid;grid-template-columns:repeat(5,1fr);padding:8px 0 calc(10px + env(safe-area-inset-bottom));backdrop-filter:blur(10px);z-index:100;}
        .nav-item{display:flex;flex-direction:column;align-items:center;gap:2px;color:var(--muted);text-decoration:none;font-size:12px;padding:6px 0;transition:all 0.2s;}
        .nav-item.active{color:#fff;}
        .nav-icon{width:22px;height:22px;color:currentColor;}
        
        .toast {
            position: fixed;
            bottom: 100px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--surface);
            color: var(--text);
            padding: 12px 24px;
            border-radius: 24px;
            font-size: 14px;
            font-weight: 500;
            z-index: 1000;
            animation: slideUp 0.3s ease-out;
            border: 1px solid var(--border);
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }
        
        .toast.success {
            background: var(--success);
            color: white;
            border-color: var(--success);
        }
        
        .toast.error {
            background: var(--danger);
            color: white;
            border-color: var(--danger);
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translate(-50%, 100%);
            }
            to {
                opacity: 1;
                transform: translate(-50%, 0);
            }
        }
        
        .loading-spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid var(--bg);
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
            margin-left: 8px;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="app-header">
        <a href="/crypto" style="color: var(--accent);">
            <svg class="icon-btn" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5M12 19L5 12L12 5"/>
            </svg>
        </a>
        <div class="app-title">Swap Crypto</div>
        <div style="width: 28px;"></div>
    </div>

    <!-- Main Swap Container -->
    <div class="swap-container">
        <form id="swapForm">
            <!-- From Section -->
            <div style="margin-bottom: 8px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                    <span style="font-size: 14px; color: var(--muted);">From</span>
                    <span style="font-size: 14px; color: var(--muted);">Balance: <span id="fromBalance">0.00000000</span></span>
                </div>
                
                <div class="crypto-select-card">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                        <select name="from" class="crypto-select" id="fromSelect">
                                                            <option value="USDT"
                                        data-id="1"
                                        data-balance="0"
                                        data-price="0">
                                    USDT                                </option>
                                                            <option value="BTC"
                                        data-id="2"
                                        data-balance="0"
                                        data-price="0">
                                    BTC                                </option>
                                                            <option value="ETH"
                                        data-id="3"
                                        data-balance="0"
                                        data-price="0">
                                    ETH                                </option>
                                                            <option value="BNB"
                                        data-id="4"
                                        data-balance="0"
                                        data-price="0">
                                    BNB                                </option>
                                                            <option value="SOL"
                                        data-id="5"
                                        data-balance="0"
                                        data-price="0">
                                    SOL                                </option>
                                                            <option value="TRX"
                                        data-id="6"
                                        data-balance="0"
                                        data-price="0">
                                    TRX                                </option>
                                                            <option value="DOGE"
                                        data-id="7"
                                        data-balance="0"
                                        data-price="0">
                                    DOGE                                </option>
                                                            <option value="SHIB"
                                        data-id="8"
                                        data-balance="0"
                                        data-price="0">
                                    SHIB                                </option>
                                                            <option value="XRP"
                                        data-id="9"
                                        data-balance="0"
                                        data-price="0">
                                    XRP                                </option>
                                                            <option value="BCH"
                                        data-id="10"
                                        data-balance="0"
                                        data-price="0">
                                    BCH                                </option>
                                                            <option value="XLM"
                                        data-id="11"
                                        data-balance="0"
                                        data-price="0">
                                    XLM                                </option>
                                                            <option value="LTC"
                                        data-id="12"
                                        data-balance="0"
                                        data-price="0">
                                    LTC                                </option>
                                                            <option value="ALGO"
                                        data-id="13"
                                        data-balance="0"
                                        data-price="0">
                                    ALGO                                </option>
                                                            <option value="DOT"
                                        data-id="14"
                                        data-balance="0"
                                        data-price="0">
                                    DOT                                </option>
                                                            <option value="ADA"
                                        data-id="15"
                                        data-balance="0"
                                        data-price="0">
                                    ADA                                </option>
                                                            <option value="USDT_TRC20"
                                        data-id="16"
                                        data-balance="0"
                                        data-price="0">
                                    USDT_TRC20                                </option>
                                                            <option value="USDT_BSC"
                                        data-id="17"
                                        data-balance="0"
                                        data-price="0">
                                    USDT_BSC                                </option>
                                                            <option value="USDT_ERC20"
                                        data-id="18"
                                        data-balance="0"
                                        data-price="0">
                                    USDT_ERC20                                </option>
                                                            <option value="PEPE"
                                        data-id="19"
                                        data-balance="0"
                                        data-price="0">
                                    PEPE                                </option>
                                                            <option value="LINK"
                                        data-id="20"
                                        data-balance="0"
                                        data-price="0">
                                    LINK                                </option>
                                                            <option value="JASMY"
                                        data-id="21"
                                        data-balance="0"
                                        data-price="0">
                                    JASMY                                </option>
                                                            <option value="POL"
                                        data-id="22"
                                        data-balance="0"
                                        data-price="0">
                                    POL                                </option>
                                                            <option value="CELO"
                                        data-id="23"
                                        data-balance="0"
                                        data-price="0">
                                    CELO                                </option>
                                                            <option value="HBAR"
                                        data-id="24"
                                        data-balance="0"
                                        data-price="0">
                                    HBAR                                </option>
                                                            <option value="QNT"
                                        data-id="25"
                                        data-balance="0"
                                        data-price="0">
                                    QNT                                </option>
                                                            <option value="ONDO"
                                        data-id="26"
                                        data-balance="0"
                                        data-price="0">
                                    ONDO                                </option>
                                                            <option value="TRB"
                                        data-id="27"
                                        data-balance="0"
                                        data-price="0">
                                    TRB                                </option>
                                                            <option value="FLR"
                                        data-id="28"
                                        data-balance="0"
                                        data-price="0">
                                    FLR                                </option>
                                                            <option value="VET"
                                        data-id="29"
                                        data-balance="0"
                                        data-price="0">
                                    VET                                </option>
                                                            <option value="IOTX"
                                        data-id="30"
                                        data-balance="0"
                                        data-price="0">
                                    IOTX                                </option>
                                                            <option value="ZBCN"
                                        data-id="31"
                                        data-balance="0"
                                        data-price="0">
                                    ZBCN                                </option>
                                                            <option value="LCX"
                                        data-id="32"
                                        data-balance="0"
                                        data-price="0">
                                    LCX                                </option>
                                                            <option value="CRO"
                                        data-id="33"
                                        data-balance="0"
                                        data-price="0">
                                    CRO                                </option>
                                                            <option value="MOG"
                                        data-id="59"
                                        data-balance="0"
                                        data-price="0">
                                    MOG                                </option>
                                                            <option value="TOSHI"
                                        data-id="60"
                                        data-balance="0"
                                        data-price="0">
                                    TOSHI                                </option>
                                                            <option value="XMN"
                                        data-id="61"
                                        data-balance="0"
                                        data-price="0">
                                    XMN                                </option>
                                                            <option value="WLFI"
                                        data-id="62"
                                        data-balance="0"
                                        data-price="0">
                                    WLFI                                </option>
                                                            <option value="AVAX"
                                        data-id="63"
                                        data-balance="0"
                                        data-price="0">
                                    AVAX                                </option>
                                                            <option value="FET"
                                        data-id="64"
                                        data-balance="0"
                                        data-price="0">
                                    FET                                </option>
                                                    </select>
                        <input type="number" name="amount" step="any" required
                               class="amount-input" placeholder="0.00" id="amountInput">
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="display: flex; gap: 8px;">
                            <button type="button" class="percentage-btn" data-percentage="25">25%</button>
                            <button type="button" class="percentage-btn" data-percentage="50">50%</button>
                            <button type="button" class="percentage-btn" data-percentage="75">75%</button>
                            <button type="button" class="percentage-btn" data-percentage="100">MAX</button>
                        </div>
                        <div style="font-size: 14px; color: var(--muted);">
                            ≈ $<span id="estimatedUsdFrom">0.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Swap Direction Button -->
            <div style="display: flex; justify-content: center; margin: 16px 0;">
                <button type="button" id="swapDirection" class="swap-button">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M7 16L17 6M17 6H9M17 6V14"/>
                        <path d="M17 8L7 18M7 18H15M7 18V10"/>
                    </svg>
                </button>
            </div>

            <!-- To Section -->
            <div style="margin-bottom: 24px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                    <span style="font-size: 14px; color: var(--muted);">To</span>
                    <span style="font-size: 14px; color: var(--muted);">Balance: <span id="toBalance">0.00000000</span></span>
                </div>
                
                <div class="crypto-select-card">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                        <select name="to" class="crypto-select" id="toSelect">
                                                            <option value="USDT"
                                        data-id="1"
                                        data-balance="0"
                                        data-price="0">
                                    USDT                                </option>
                                                            <option value="BTC"
                                        data-id="2"
                                        data-balance="0"
                                        data-price="0">
                                    BTC                                </option>
                                                            <option value="ETH"
                                        data-id="3"
                                        data-balance="0"
                                        data-price="0">
                                    ETH                                </option>
                                                            <option value="BNB"
                                        data-id="4"
                                        data-balance="0"
                                        data-price="0">
                                    BNB                                </option>
                                                            <option value="SOL"
                                        data-id="5"
                                        data-balance="0"
                                        data-price="0">
                                    SOL                                </option>
                                                            <option value="TRX"
                                        data-id="6"
                                        data-balance="0"
                                        data-price="0">
                                    TRX                                </option>
                                                            <option value="DOGE"
                                        data-id="7"
                                        data-balance="0"
                                        data-price="0">
                                    DOGE                                </option>
                                                            <option value="SHIB"
                                        data-id="8"
                                        data-balance="0"
                                        data-price="0">
                                    SHIB                                </option>
                                                            <option value="XRP"
                                        data-id="9"
                                        data-balance="0"
                                        data-price="0">
                                    XRP                                </option>
                                                            <option value="BCH"
                                        data-id="10"
                                        data-balance="0"
                                        data-price="0">
                                    BCH                                </option>
                                                            <option value="XLM"
                                        data-id="11"
                                        data-balance="0"
                                        data-price="0">
                                    XLM                                </option>
                                                            <option value="LTC"
                                        data-id="12"
                                        data-balance="0"
                                        data-price="0">
                                    LTC                                </option>
                                                            <option value="ALGO"
                                        data-id="13"
                                        data-balance="0"
                                        data-price="0">
                                    ALGO                                </option>
                                                            <option value="DOT"
                                        data-id="14"
                                        data-balance="0"
                                        data-price="0">
                                    DOT                                </option>
                                                            <option value="ADA"
                                        data-id="15"
                                        data-balance="0"
                                        data-price="0">
                                    ADA                                </option>
                                                            <option value="USDT_TRC20"
                                        data-id="16"
                                        data-balance="0"
                                        data-price="0">
                                    USDT_TRC20                                </option>
                                                            <option value="USDT_BSC"
                                        data-id="17"
                                        data-balance="0"
                                        data-price="0">
                                    USDT_BSC                                </option>
                                                            <option value="USDT_ERC20"
                                        data-id="18"
                                        data-balance="0"
                                        data-price="0">
                                    USDT_ERC20                                </option>
                                                            <option value="PEPE"
                                        data-id="19"
                                        data-balance="0"
                                        data-price="0">
                                    PEPE                                </option>
                                                            <option value="LINK"
                                        data-id="20"
                                        data-balance="0"
                                        data-price="0">
                                    LINK                                </option>
                                                            <option value="JASMY"
                                        data-id="21"
                                        data-balance="0"
                                        data-price="0">
                                    JASMY                                </option>
                                                            <option value="POL"
                                        data-id="22"
                                        data-balance="0"
                                        data-price="0">
                                    POL                                </option>
                                                            <option value="CELO"
                                        data-id="23"
                                        data-balance="0"
                                        data-price="0">
                                    CELO                                </option>
                                                            <option value="HBAR"
                                        data-id="24"
                                        data-balance="0"
                                        data-price="0">
                                    HBAR                                </option>
                                                            <option value="QNT"
                                        data-id="25"
                                        data-balance="0"
                                        data-price="0">
                                    QNT                                </option>
                                                            <option value="ONDO"
                                        data-id="26"
                                        data-balance="0"
                                        data-price="0">
                                    ONDO                                </option>
                                                            <option value="TRB"
                                        data-id="27"
                                        data-balance="0"
                                        data-price="0">
                                    TRB                                </option>
                                                            <option value="FLR"
                                        data-id="28"
                                        data-balance="0"
                                        data-price="0">
                                    FLR                                </option>
                                                            <option value="VET"
                                        data-id="29"
                                        data-balance="0"
                                        data-price="0">
                                    VET                                </option>
                                                            <option value="IOTX"
                                        data-id="30"
                                        data-balance="0"
                                        data-price="0">
                                    IOTX                                </option>
                                                            <option value="ZBCN"
                                        data-id="31"
                                        data-balance="0"
                                        data-price="0">
                                    ZBCN                                </option>
                                                            <option value="LCX"
                                        data-id="32"
                                        data-balance="0"
                                        data-price="0">
                                    LCX                                </option>
                                                            <option value="CRO"
                                        data-id="33"
                                        data-balance="0"
                                        data-price="0">
                                    CRO                                </option>
                                                            <option value="MOG"
                                        data-id="59"
                                        data-balance="0"
                                        data-price="0">
                                    MOG                                </option>
                                                            <option value="TOSHI"
                                        data-id="60"
                                        data-balance="0"
                                        data-price="0">
                                    TOSHI                                </option>
                                                            <option value="XMN"
                                        data-id="61"
                                        data-balance="0"
                                        data-price="0">
                                    XMN                                </option>
                                                            <option value="WLFI"
                                        data-id="62"
                                        data-balance="0"
                                        data-price="0">
                                    WLFI                                </option>
                                                            <option value="AVAX"
                                        data-id="63"
                                        data-balance="0"
                                        data-price="0">
                                    AVAX                                </option>
                                                            <option value="FET"
                                        data-id="64"
                                        data-balance="0"
                                        data-price="0">
                                    FET                                </option>
                                                    </select>
                        <div style="font-size: 24px; font-weight: 600; color: var(--text);" id="receiveAmount">0.00</div>
                    </div>
                    
                    <div style="text-align: right; font-size: 14px; color: var(--muted);">
                        ≈ $<span id="estimatedUsdTo">0.00</span>
                    </div>
                </div>
            </div>

            <!-- Exchange Rate Info -->
            <div class="estimated-info">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                    <span style="font-size: 14px; color: var(--muted);">Exchange Rate</span>
                    <span style="font-size: 14px; font-weight: 600; color: var(--text);" id="exchangeRate">1 BTC = 0.00 ETH</span>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 14px; color: var(--muted);">You'll receive</span>
                    <span style="font-size: 14px; font-weight: 600; color: var(--accent);" id="finalReceiveAmount">0.00 ETH</span>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-button" id="submitButton">
                <span id="submitText">Swap Now</span>
            </button>
        </form>
    </div>

    <!-- Bottom Navigation -->
    <div class="bottom-nav">
        <a href="/crypto" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor">
                <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z"/>
                <path d="M9 22V12H15V22"/>
            </svg>
            <span>Home</span>
        </a>
        <a href="/crypto/stake" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 3V9M21 3V9M3 15V21M21 15V21M3 9H21M3 15H21"/>
            </svg>
            <span>Earn</span>
        </a>
        <a href="/crypto/swap" class="nav-item active">
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
        <a href="/crypto/account" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="18" height="14" rx="2"/>
                <path d="M8 21h8M12 17v4"/>
            </svg>
            <span>Account</span>
        </a>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const fromSelect = document.getElementById('fromSelect');
        const toSelect = document.getElementById('toSelect');
        const amountInput = document.getElementById('amountInput');
        const swapForm = document.getElementById('swapForm');
        const swapDirectionBtn = document.getElementById('swapDirection');
        
        // Set different initial values
        toSelect.selectedIndex = 1;

        function updateBalanceDisplay(selectElement, balanceId) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const balance = parseFloat(selectedOption.getAttribute('data-balance'));
            document.getElementById(balanceId).textContent = balance.toFixed(8);
        }

        function updateEstimatedValues() {
            const fromOption = fromSelect.options[fromSelect.selectedIndex];
            const toOption = toSelect.options[toSelect.selectedIndex];
            const fromPrice = parseFloat(fromOption.getAttribute('data-price'));
            const toPrice = parseFloat(toOption.getAttribute('data-price'));
            const inputAmount = parseFloat(amountInput.value) || 0;

            const usdValue = inputAmount * fromPrice;
            const receiveAmount = toPrice > 0 ? usdValue / toPrice : 0;
            
            document.getElementById('estimatedUsdFrom').textContent = usdValue.toFixed(2);
            document.getElementById('estimatedUsdTo').textContent = usdValue.toFixed(2);
            document.getElementById('receiveAmount').textContent = receiveAmount.toFixed(8);
            document.getElementById('finalReceiveAmount').textContent = receiveAmount.toFixed(8) + ' ' + toOption.value;
            
            const exchangeRate = fromPrice > 0 && toPrice > 0 ? (toPrice / fromPrice).toFixed(8) : 0;
            document.getElementById('exchangeRate').textContent = 
                `1 ${fromOption.value} = ${exchangeRate} ${toOption.value}`;
        }

        function updatePercentageButtons() {
            const selectedOption = fromSelect.options[fromSelect.selectedIndex];
            const maxBalance = parseFloat(selectedOption.getAttribute('data-balance'));
            
            document.querySelectorAll('.percentage-btn').forEach(btn => {
                btn.onclick = () => {
                    const percentage = parseFloat(btn.getAttribute('data-percentage'));
                    const value = maxBalance * (percentage / 100);
                    amountInput.value = value.toFixed(8);
                    updateEstimatedValues();
                };
            });
        }

        fromSelect.addEventListener('change', function() {
            updateBalanceDisplay(this, 'fromBalance');
            updatePercentageButtons();
            updateEstimatedValues();
        });

        toSelect.addEventListener('change', function() {
            updateBalanceDisplay(this, 'toBalance');
            updateEstimatedValues();
        });

        amountInput.addEventListener('input', updateEstimatedValues);

        swapDirectionBtn.addEventListener('click', function() {
            const tempIndex = fromSelect.selectedIndex;
            fromSelect.selectedIndex = toSelect.selectedIndex;
            toSelect.selectedIndex = tempIndex;
            
            updateBalanceDisplay(fromSelect, 'fromBalance');
            updateBalanceDisplay(toSelect, 'toBalance');
            updatePercentageButtons();
            updateEstimatedValues();
        });

        swapForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            const submitButton = document.getElementById('submitButton');
            const submitText = document.getElementById('submitText');
            
            const amount = parseFloat(amountInput.value);
            const fromOption = fromSelect.options[fromSelect.selectedIndex];
            const toOption = toSelect.options[toSelect.selectedIndex];
            const maxBalance = parseFloat(fromOption.getAttribute('data-balance'));
            
            if (amount <= 0) {
                showToast('Please enter a valid amount', 'error');
                return;
            }
            
            if (amount > maxBalance) {
                showToast('Insufficient balance', 'error');
                return;
            }
            
            if (fromSelect.value === toSelect.value) {
                showToast('Please select different cryptocurrencies', 'error');
                return;
            }

            submitButton.disabled = true;
            submitText.innerHTML = 'Processing...<span class="loading-spinner"></span>';
            
            try {
                const formData = new FormData();
                formData.append('from_token_id', fromOption.getAttribute('data-id'));
                formData.append('to_token_id', toOption.getAttribute('data-id'));
                formData.append('amount', amount);
                formData.append('from_symbol', fromSelect.value);
                formData.append('to_symbol', toSelect.value);
                
                const response = await fetch('process_swap.php', {
                    method: 'POST',
                    body: formData
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showToast('Swap completed successfully!', 'success');
                    setTimeout(() => window.location.reload(), 1500);
                } else {
                    throw new Error(data.error || 'Swap failed');
                }
            } catch (error) {
                console.error('Swap error:', error);
                showToast(error.message || 'An error occurred', 'error');
            } finally {
                submitButton.disabled = false;
                submitText.textContent = 'Swap Now';
            }
        });

        // Initialize
        updateBalanceDisplay(fromSelect, 'fromBalance');
        updateBalanceDisplay(toSelect, 'toBalance');
        updatePercentageButtons();
        updateEstimatedValues();
    });

    function showToast(message, type = 'success') {
        const existingToasts = document.querySelectorAll('.toast');
        existingToasts.forEach(toast => toast.remove());
        
        const toast = document.createElement('div');
        toast.className = `toast ${type}`;
        toast.textContent = message;
        
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
    </script>
</body>
</html>
