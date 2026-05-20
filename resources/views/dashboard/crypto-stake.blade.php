<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/images/logo.png" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Stake Crypto</title>
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
        body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);margin:0;min-height:100vh;}
        .wallet-header{background:var(--bg);padding:16px 20px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--border);position:sticky;top:0;z-index:50;backdrop-filter:blur(10px);}
        .stats-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:12px;padding:16px 20px;}
        .stat-card{background:var(--surface);border-radius:12px;padding:16px;border:1px solid var(--border);transition:.2s;}
        .stat-card:hover{background:var(--surface-2);}
        .stake-container{background:var(--surface);border-radius:16px;margin:0 20px 16px;border:1px solid var(--border);}
        .section-header{padding:20px 20px 0;font-size:18px;font-weight:600;}
        .plan-card{background:var(--surface-2);border-radius:12px;padding:16px;margin:0 20px 12px;border:2px solid var(--border);cursor:pointer;transition:.2s;}
        .plan-card:hover{border-color:var(--accent);}
        .plan-card.active{border-color:var(--accent);background:var(--surface);}
        .form-section{padding:20px;}
        .crypto-select-card{background:var(--surface-2);border-radius:12px;padding:16px;border:1px solid var(--border);margin-bottom:12px;}
        .crypto-select{background:transparent;border:none;outline:none;width:100%;font-size:16px;font-weight:600;color:var(--text);appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%239ca3af'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right center;background-size:20px;padding-right:24px;}
        .amount-input{background:transparent;border:none;outline:none;width:100%;text-align:right;font-size:20px;font-weight:600;color:var(--text);}
        .percentage-btn{background:var(--surface);border:1px solid var(--border);border-radius:8px;padding:8px 12px;font-size:12px;font-weight:600;color:var(--muted);cursor:pointer;transition:.2s;}
        .percentage-btn:hover{background:var(--accent);color:var(--bg);border-color:var(--accent);}
        .submit-button{width:100%;background:var(--accent);color:var(--bg);border:none;border-radius:12px;padding:16px;font-size:16px;font-weight:600;margin-top:16px;cursor:pointer;transition:.2s;}
        .submit-button:disabled{background:var(--border);color:var(--muted);cursor:not-allowed;}
        .bottom-nav{position:fixed;bottom:0;left:0;right:0;background:var(--surface);border-top:1px solid var(--border);padding:8px 0 calc(10px + env(safe-area-inset-bottom));display:grid;grid-template-columns:repeat(5,1fr);backdrop-filter:blur(10px);z-index:100;}
        .nav-item{display:flex;flex-direction:column;align-items:center;padding:8px;color:var(--muted);text-decoration:none;font-size:12px;font-weight:500;transition:.2s;}
        .nav-item.active{color:var(--accent);}
        .toast{position:fixed;bottom:100px;left:50%;transform:translateX(-50%);background:var(--surface);color:var(--text);padding:12px 24px;border-radius:24px;font-size:14px;border:1px solid var(--border);z-index:100;}
    </style>
</head>
<body>
    <!-- Header -->
    <div class="wallet-header">
        <svg onclick="window.location.href='/crypto'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:28px;height:28px;color:var(--muted);cursor:pointer;transition:.2s;">
            <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
        <div style="font-size:20px;font-weight:700;color:var(--text);">Stake Crypto</div>
        <div style="width:28px;"></div>
    </div>

    <!-- Statistics Section (now from DB) -->
    <div class="stats-grid">
        <!-- APR range -->
        <div class="stat-card">
            <div class="stat-value">
                20.0% - 202.0%
            </div>
            <div class="stat-label">APR Range</div>
        </div>

        <!-- Active stakes from stakes table -->
        <div class="stat-card">
            <div class="stat-value">
                0            </div>
            <div class="stat-label">Active Stakes</div>
        </div>

        <!-- Total Staked from stakes table -->
        <div class="stat-card">
            <div class="stat-value">
                $0.00            </div>
            <div class="stat-label">Total Staked</div>
        </div>

        <!-- Total Rewards from stakes table -->
        <div class="stat-card">
            <div class="stat-value">
                $0.00            </div>
            <div class="stat-label">Total Rewards</div>
        </div>
    </div>

    <!-- New Stake Section -->
    <div class="stake-container" style="margin-bottom:100px;">
        <div class="section-header">Create New Stake</div>

        <!-- Plans -->
        <div style="padding:0 20px 20px;">
            <div style="font-size:14px;color:var(--muted);margin-bottom:12px;">Select Plan</div>
                            <div
                    class="plan-card active"
                    data-plan-id="1"
                    data-plan-type="fixed"
                    data-plan-roi="20"
                    data-plan-days="7"
                    data-plan-min="200"
                    data-plan-max="300"
                >
                    <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:12px;">
                        <div>
                            <h3 style="font-size:16px;font-weight:600;color:var(--text);margin-bottom:4px;">lido</h3>
                            <p style="font-size:12px;color:var(--muted);">Lock: 7 day(s)</p>
                        </div>
                        <div class="plan-radio" style="width:20px;height:20px;border:2px solid var(--border);border-radius:50%;"></div>
                    </div>

                    <div style="display:flex;align-items:baseline;gap:8px;margin-bottom:12px;">
                        <span style="font-size:20px;font-weight:700;color:var(--accent);">+20.00%</span>
                        <span style="font-size:14px;color:var(--muted);">/ 7 days</span>
                    </div>

                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;font-size:12px;color:var(--muted);">
                        <div>Min: $200.00</div>
                        <div>Max: $300.00</div>
                    </div>
                </div>
                            <div
                    class="plan-card "
                    data-plan-id="2"
                    data-plan-type="fixed"
                    data-plan-roi="202"
                    data-plan-days="2"
                    data-plan-min="62"
                    data-plan-max="700"
                >
                    <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:12px;">
                        <div>
                            <h3 style="font-size:16px;font-weight:600;color:var(--text);margin-bottom:4px;">bitorefnvest plan</h3>
                            <p style="font-size:12px;color:var(--muted);">Lock: 2 day(s)</p>
                        </div>
                        <div class="plan-radio" style="width:20px;height:20px;border:2px solid var(--border);border-radius:50%;"></div>
                    </div>

                    <div style="display:flex;align-items:baseline;gap:8px;margin-bottom:12px;">
                        <span style="font-size:20px;font-weight:700;color:var(--accent);">+202.00%</span>
                        <span style="font-size:14px;color:var(--muted);">/ 2 days</span>
                    </div>

                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;font-size:12px;color:var(--muted);">
                        <div>Min: $62.00</div>
                        <div>Max: $700.00</div>
                    </div>
                </div>
                    </div>

        <!-- Stake Form -->
        <form id="stakeForm" class="form-section" action="api/process_stake.php" method="post">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
                <span style="font-size:14px;color:var(--muted);">Amount to Stake</span>
                <span style="font-size:14px;color:var(--muted);">
                    Balance: <span id="cryptoBalance">0.00000000</span> (<span id="usdBalance">$0.00</span>)
                </span>
            </div>

            <!-- token select -->
            <div class="crypto-select-card">
                <select name="stake_currency" id="cryptoSelect" class="crypto-select">
                                            <option
                            value="usdt"
                            data-balance="0"
                            data-usd="0"
                            data-price="1"
                            data-symbol="USDT"
                        >
                            Tether (USDT)
                        </option>
                                            <option
                            value="btc"
                            data-balance="0"
                            data-usd="0"
                            data-price="110000"
                            data-symbol="BTC"
                        >
                            Bitcoin (BTC)
                        </option>
                                            <option
                            value="eth"
                            data-balance="0"
                            data-usd="0"
                            data-price="3800"
                            data-symbol="ETH"
                        >
                            Ethereum (ETH)
                        </option>
                                            <option
                            value="bnb"
                            data-balance="0"
                            data-usd="0"
                            data-price="600"
                            data-symbol="BNB"
                        >
                            BNB (BNB)
                        </option>
                                            <option
                            value="sol"
                            data-balance="0"
                            data-usd="0"
                            data-price="180"
                            data-symbol="SOL"
                        >
                            Solana (SOL)
                        </option>
                                            <option
                            value="trx"
                            data-balance="0"
                            data-usd="0"
                            data-price="0.12"
                            data-symbol="TRX"
                        >
                            TRON (TRX)
                        </option>
                                            <option
                            value="doge"
                            data-balance="0"
                            data-usd="0"
                            data-price="0.15"
                            data-symbol="DOGE"
                        >
                            Dogecoin (DOGE)
                        </option>
                                            <option
                            value="shib"
                            data-balance="0"
                            data-usd="0"
                            data-price="2.0E-5"
                            data-symbol="SHIB"
                        >
                            Shiba Inu (SHIB)
                        </option>
                                            <option
                            value="xrp"
                            data-balance="0"
                            data-usd="0"
                            data-price="2.5"
                            data-symbol="XRP"
                        >
                            Ripple (XRP)
                        </option>
                                            <option
                            value="xlm"
                            data-balance="0"
                            data-usd="0"
                            data-price="0.3"
                            data-symbol="XLM"
                        >
                            Stellar (XLM)
                        </option>
                                            <option
                            value="ada"
                            data-balance="0"
                            data-usd="0"
                            data-price="0.6"
                            data-symbol="ADA"
                        >
                            Cardano (ADA)
                        </option>
                                            <option
                            value="ltc"
                            data-balance="0"
                            data-usd="0"
                            data-price="100"
                            data-symbol="LTC"
                        >
                            Litecoin (LTC)
                        </option>
                                            <option
                            value="flr"
                            data-balance="0"
                            data-usd="0"
                            data-price="0.03"
                            data-symbol="FLR"
                        >
                            Flare (FLR)
                        </option>
                                    </select>
            </div>

            <!-- amount -->
            <div class="crypto-select-card">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
                    <span style="font-size:14px;color:var(--muted);">Amount</span>
                    <input type="number" name="stake_amount" id="stakeAmount" step="any" class="amount-input" placeholder="0.00" required>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <div style="display:flex;gap:8px;">
                        <button type="button" class="percentage-btn" data-percentage="25">25%</button>
                        <button type="button" class="percentage-btn" data-percentage="50">50%</button>
                        <button type="button" class="percentage-btn" data-percentage="75">75%</button>
                        <button type="button" class="percentage-btn" data-percentage="100">MAX</button>
                    </div>
                    <div style="font-size:14px;color:var(--muted);">
                        ≈ $<span id="estimatedValue">0.00</span>
                    </div>
                </div>
            </div>

            <!-- expected return -->
            <div id="expectedReturnCard" style="background:var(--surface-2);border-radius:12px;padding:16px;margin:16px 0;border:1px solid var(--border);">
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <div>
                        <div style="font-size:14px;color:var(--muted);margin-bottom:4px;">Expected Return</div>
                        <div style="font-size:18px;font-weight:700;color:var(--accent);" id="expectedReturnAmount">0.00</div>
                    </div>
                    <div style="background:var(--accent);opacity:0.2;border-radius:8px;padding:8px;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent)">
                            <path d="M7 14L12 9L17 14H7Z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- terms -->
            <label style="display:flex;gap:12px;align-items:flex-start;cursor:pointer;">
                <input type="checkbox" id="termsCheckbox" name="terms_agreed" style="width:20px;height:20px;">
                <span style="font-size:14px;color:var(--muted);line-height:1.4;">I understand that my assets will be locked for the duration of the staking period and cannot be withdrawn early.</span>
            </label>

            <!-- plan id hidden -->
            <input type="hidden" name="plan_id" id="planIdInput" value="1">

            <button type="submit" class="submit-button" id="stakeButton" disabled>
                <span id="submitText">Stake Now</span>
                <svg id="loadingSpinner" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none;margin-left:8px;">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M12 6V12L16 14"/>
                </svg>
            </button>
        </form>
    </div>

    <!-- Bottom Navigation (your original structure) -->
    <div class="bottom-nav">
        <a href="/crypto" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor" style="width:24px;height:24px;margin-bottom:4px;">
                <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z"/>
                <path d="M9 22V12H15V22"/>
            </svg>
            <span>Home</span>
        </a>
        <a href="/crypto/stake" class="nav-item active">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:24px;height:24px;margin-bottom:4px;">
                <path d="M3 3V9M21 3V9M3 15V21M21 15V21M3 9H21M3 15H21"/>
            </svg>
            <span>Earn</span>
        </a>
        <a href="/crypto/swap" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:24px;height:24px;margin-bottom:4px;">
                <path d="M7 16L17 6M17 6H9M17 6V14"/>
                <path d="M17 8L7 18M7 18H15M7 18V10"/>
            </svg>
            <span>Trade</span>
        </a>
        <a href="{{ route('crypto.link-wallet') }}" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:24px;height:24px;margin-bottom:4px;">
                <circle cx="12" cy="12" r="3"/>
                <path d="M12 1V3M12 21V23M4.22 4.22L5.64 5.64M18.36 18.36L19.78 19.78M1 12H3M21 12H23M4.22 19.78L5.64 18.36M18.36 5.64L19.78 4.22"/>
            </svg>
            <span>Link</span>
        </a>
        <a href="/crypto/account" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:24px;height:24px;margin-bottom:4px;">
                <rect x="3" y="3" width="18" height="14" rx="2"/>
                <path d="M8 21h8M12 17v4"/>
            </svg>
            <span>Account</span>
        </a>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const stakeForm = document.getElementById('stakeForm');
        const amountInput = document.getElementById('stakeAmount');
        const termsCheckbox = document.getElementById('termsCheckbox');
        const stakeButton = document.getElementById('stakeButton');
        const cryptoSelect = document.getElementById('cryptoSelect');
        const planCards = document.querySelectorAll('.plan-card');
        const expectedReturnAmount = document.getElementById('expectedReturnAmount');
        const planIdInput = document.getElementById('planIdInput');
        const estEl = document.getElementById('estimatedValue');
        const balEl = document.getElementById('cryptoBalance');
        const usdBalEl = document.getElementById('usdBalance');

        let currentMaxBalance = 0;

        function updateBalanceDisplay() {
            const opt = cryptoSelect.options[cryptoSelect.selectedIndex];
            const bal = parseFloat(opt.dataset.balance || '0');
            const usd = parseFloat(opt.dataset.usd || '0');
            const sym = opt.dataset.symbol || '';
            balEl.textContent = bal.toFixed(8) + ' ' + sym;
            usdBalEl.textContent = '$' + usd.toFixed(2);
            currentMaxBalance = bal;
        }

        function updateEstimatedValues() {
            const opt = cryptoSelect.options[cryptoSelect.selectedIndex];
            const price = parseFloat(opt.dataset.price || '0');
            const amount = parseFloat(amountInput.value || '0');
            const usdVal = amount * price;
            estEl.textContent = usdVal.toFixed(2);
        }

        function updateExpectedReturn() {
            const activePlan = document.querySelector('.plan-card.active');
            if (!activePlan) return;
            const roi = parseFloat(activePlan.dataset.planRoi || '0');
            const days = parseInt(activePlan.dataset.planDays || '0');
            const opt = cryptoSelect.options[cryptoSelect.selectedIndex];
            const price = parseFloat(opt.dataset.price || '0');
            const amount = parseFloat(amountInput.value || '0');
            const usdVal = amount * price;
            const gainUsd = usdVal * (roi/100);
            expectedReturnAmount.textContent = '$' + gainUsd.toFixed(2) + ' (in ' + days + 'd)';
        }

        function validateForm() {
            const activePlan = document.querySelector('.plan-card.active');
            if (!activePlan) { stakeButton.disabled = true; return; }

            const opt = cryptoSelect.options[cryptoSelect.selectedIndex];
            const price = parseFloat(opt.dataset.price || '0');
            const amount = parseFloat(amountInput.value || '0');
            const userBal = parseFloat(opt.dataset.balance || '0');

            const minUsd = parseFloat(activePlan.dataset.planMin || '0');
            const maxUsd = parseFloat(activePlan.dataset.planMax || '0');

            let ok = true;
            if (amount <= 0) ok = false;
            if (!termsCheckbox.checked) ok = false;
            if (amount > userBal) ok = false;

            const usdVal = amount * price;
            if (usdVal < minUsd) ok = false;
            if (maxUsd > 0 && usdVal > maxUsd) ok = false;

            stakeButton.disabled = !ok;
        }

        // plan selection
        planCards.forEach(card => {
            card.addEventListener('click', function() {
                planCards.forEach(c => c.classList.remove('active'));
                this.classList.add('active');
                planIdInput.value = this.dataset.planId;
                updateExpectedReturn();
                validateForm();
            });
        });

        // percent buttons
        document.querySelectorAll('.percentage-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const pct = parseFloat(this.dataset.percentage || '0');
                const val = currentMaxBalance * (pct/100);
                amountInput.value = val.toFixed(8);
                updateEstimatedValues();
                updateExpectedReturn();
                validateForm();
            });
        });

        cryptoSelect.addEventListener('change', function() {
            updateBalanceDisplay();
            updateEstimatedValues();
            updateExpectedReturn();
            validateForm();
        });

        amountInput.addEventListener('input', function() {
            updateEstimatedValues();
            updateExpectedReturn();
            validateForm();
        });

        termsCheckbox.addEventListener('change', validateForm);

        // initial
        updateBalanceDisplay();
        updateEstimatedValues();
        updateExpectedReturn();
        validateForm();
    });
    </script>
</body>
</html>
