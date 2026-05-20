<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Cards - web3Port</title>
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
            min-height:100vh;
        }
        .app-header{
            display:flex;align-items:center;justify-content:space-between;
            padding:16px 20px;border-bottom:1px solid var(--border);
            background:var(--bg);position:sticky;top:0;z-index:100;
            backdrop-filter:blur(10px);
        }
        .app-title{font-size:20px;font-weight:700;}
        .icon-btn{
            width:36px;height:36px;display:flex;align-items:center;justify-content:center;
            background:var(--surface);border:1px solid var(--border);border-radius:8px;
            color:var(--muted);cursor:pointer;transition:.3s;text-decoration:none;
        }
        .icon-btn:hover{background:var(--surface-2);color:var(--accent);}
        
        /* Premium Card Gradients */
        .card-visa{background:linear-gradient(135deg,#1e40af 0%,#3b82f6 100%);}
        .card-mastercard{background:linear-gradient(135deg,#dc2626 0%,#f87171 100%);}
        .card-amex{background:linear-gradient(135deg,#059669 0%,#34d399 100%);}
        .card-discover{background:linear-gradient(135deg,#ea580c 0%,#fb923c 100%);}
        
        .card-3d{
            border-radius:18px;padding:22px 24px;color:white;
            box-shadow:0 10px 30px rgba(0,0,0,0.3);
            transition:all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor:pointer;position:relative;overflow:hidden;
            border:1px solid rgba(255,255,255,0.05);
            display:flex;
            flex-direction:column;
            justify-content:space-between;
            min-height:180px;
        }
        .card-3d:hover{
            transform:translateY(-8px);
            box-shadow:0 20px 40px rgba(0,0,0,0.4);
            border-color:rgba(255,255,255,0.15);
        }
        .card-3d::before{
            content:'';position:absolute;inset:0;
            background:linear-gradient(135deg,rgba(255,255,255,.12) 0%,transparent 100%);
            pointer-events:none;
        }
        .chip{
            width:42px;height:32px;background:linear-gradient(135deg,#ffd700,#ffed4e);
            border-radius:6px;box-shadow:0 2px 8px rgba(0,0,0,.3);
            position:relative;
        }
        .chip::after {
            content: '';
            position: absolute;
            inset: 6px;
            border: 1px solid rgba(0,0,0,0.15);
            border-radius: 4px;
        }
        .status-active{
            background:linear-gradient(135deg,var(--success),#16a34a);
            color:#fff;padding:4px 12px;border-radius:12px;font-size:11px;font-weight:600;
            letter-spacing: 0.3px;
        }
        .status-blocked{
            background:linear-gradient(135deg,var(--danger),#dc2626);
            color:#fff;padding:4px 12px;border-radius:12px;font-size:11px;font-weight:600;
            letter-spacing: 0.3px;
        }
        
        /* Modals */
        .modal{
            position:fixed;inset:0;z-index:1000;display:none;background:rgba(0,0,0,.75);
            backdrop-filter:blur(8px);
        }
        .modal-content{
            position:absolute;bottom:0;left:0;right:0;background:var(--surface-2);
            border-radius:24px 24px 0 0;padding:24px 20px calc(24px + env(safe-area-inset-bottom));
            transform:translateY(100%);transition:.3s cubic-bezier(0.4, 0, 0.2, 1);
            max-height:92vh;overflow-y:auto;
            border-top: 1px solid var(--border);
        }
        
        /* Desktop/Tablet support for Modal */
        @media(min-width: 640px) {
            .modal-content {
                bottom: auto;
                top: 50%;
                left: 50%;
                right: auto;
                transform: translate(-50%, -40%) scale(0.95);
                width: 100%;
                max-width: 500px;
                border-radius: 20px;
                border: 1px solid var(--border);
                box-shadow: 0 20px 50px rgba(0,0,0,0.5);
                opacity: 0;
            }
            .modal.show .modal-content {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }
        }

        .modal.show .modal-content{
            @media(max-width: 639px) {
                transform:translateY(0);
            }
        }
        
        .form-group{margin-bottom:20px;}
        .form-label{display:block;font-size:13px;font-weight:600;color:var(--muted);margin-bottom:8px;text-transform:uppercase;letter-spacing:0.5px;}
        .form-control{
            width:100%;padding:14px 16px;background:var(--surface);
            border:1px solid var(--border);border-radius:12px;color:var(--text);
            font-size:16px;box-sizing:border-box;transition:.2s;
        }
        .form-control:focus{outline:none;border-color:var(--accent);box-shadow: 0 0 10px rgba(245,197,66,0.15);}
        .btn{
            padding:16px;border-radius:12px;font-weight:700;border:none;cursor:pointer;
            display:flex;align-items:center;justify-content:center;gap:8px;transition:.3s;
            font-size:15px;
        }
        .btn-primary{
            background:var(--accent);color:#0b1220;width:100%;
        }
        .btn-primary:hover{
            transform:translateY(-2px);box-shadow:0 8px 24px rgba(245,197,66,.25);
            background:#dca51a;
        }
        .btn-primary:active{
            transform:translateY(0);
        }
        .btn-danger{
            background:rgba(239, 68, 68, 0.15);color:var(--danger);width:100%;
            border: 1px solid rgba(239, 68, 68, 0.25);
        }
        .btn-danger:hover{
            background:var(--danger);color:white;
        }
        .btn-success{
            background:rgba(34, 197, 94, 0.15);color:var(--success);width:100%;
            border: 1px solid rgba(34, 197, 94, 0.25);
        }
        .btn-success:hover{
            background:var(--success);color:white;
        }
        
        .bottom-nav{
            position:fixed;left:0;right:0;bottom:0;background:var(--surface);
            border-top:1px solid var(--border);display:grid;grid-template-columns:repeat(3,1fr);
            padding:8px 0 calc(10px + env(safe-area-inset-bottom));z-index:99;
        }
        .nav-item{
            display:flex;flex-direction:column;align-items:center;gap:3px;
            color:var(--muted);text-decoration:none;font-size:12px;padding:6px 0;
            transition: .2s;
        }
        .nav-item.active{color:var(--accent);}
        .nav-icon{width:22px;height:22px;margin-bottom: 2px;}
        
        ::-webkit-scrollbar{width:6px;}
        ::-webkit-scrollbar-track{background:var(--surface);}
        ::-webkit-scrollbar-thumb{background:var(--border);border-radius:3px;}

        /* Transaction row spacing */
        .tx-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
        }
        .tx-row:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body style="padding-bottom: 120px;">
    <!-- Header -->
    <div class="app-header">
        <a href="/crypto" class="icon-btn"><i class="ph-bold ph-arrow-left" style="font-size: 20px;"></i></a>
        <div class="app-title">Cards</div>
        <button id="applyCardBtn" class="icon-btn" style="color:var(--accent);">
            <i class="ph-bold ph-plus" style="font-size: 20px;"></i>
        </button>
    </div>

    <!-- Main Content -->
    <div style="padding:24px 20px 30px;min-height:calc(100vh - 170px); max-w-xl: mx-auto;" class="w-full max-w-xl mx-auto">
        
        @if($cards->isEmpty())
            <!-- No Cards State -->
            <div style="text-align:center;padding:60px 20px;">
                <div style="width:80px;height:80px;margin:0 auto 24px;background:var(--surface);border:2px solid var(--border);border-radius:20px;display:flex;align-items:center;justify-content:center;">
                    <i class="ph-fill ph-credit-card" style="font-size:36px;color:var(--accent);"></i>
                </div>
                <h2 style="font-size:24px;font-weight:700;margin-bottom:12px;color:white;">No Cards Yet</h2>
                <p style="color:var(--muted);margin-bottom:32px;line-height:1.6;font-size:14px;">Apply for a premium card to start enjoying exclusive benefits and rewards.</p>
                <button id="noCardsApplyBtn" class="btn btn-primary" style="max-width:300px;margin:0 auto;">
                    <i class="ph-bold ph-plus"></i> Apply for Card
                </button>
            </div>
        @else
            <!-- Cards list state -->
            <div style="margin-bottom: 32px;">
                <div style="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4" class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4">Your Debit Cards</div>
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    @foreach($cards as $card)
                        <div class="card-3d card-{{ $card->card_type }}" onclick="showCardDetails({{ $card->id }})">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; width: 100%;">
                                <div class="chip"></div>
                                <span class="status-{{ $card->status === 'active' ? 'active' : 'blocked' }}">
                                    {{ strtoupper($card->status) }}
                                </span>
                            </div>
                            
                            <div style="margin: 20px 0 10px; font-size: 20px; font-weight: 700; letter-spacing: 2px; font-family: monospace; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                                •••• •••• •••• {{ substr($card->card_number, -4) }}
                            </div>
                            
                            <div style="display: flex; justify-content: space-between; align-items: flex-end; width: 100%;">
                                <div>
                                    <div style="font-size: 9px; text-transform: uppercase; color: rgba(255,255,255,0.6); letter-spacing: 1px; margin-bottom: 2px;">Card Holder</div>
                                    <div style="font-size: 13px; font-weight: 600; text-shadow: 0 1px 2px rgba(0,0,0,0.3);">{{ $card->card_holder_name }}</div>
                                </div>
                                <div style="text-align: right; display: flex; flex-direction: column; align-items: flex-end;">
                                    <div style="font-size: 9px; text-transform: uppercase; color: rgba(255,255,255,0.6); letter-spacing: 1px; margin-bottom: 2px;">Card Type</div>
                                    <div style="font-size: 15px; font-weight: 800; font-style: italic; text-shadow: 0 1px 2px rgba(0,0,0,0.3); text-transform: uppercase;">
                                        {{ $card->card_type }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        
        <!-- Benefits -->
        <div style="margin-bottom:32px; margin-top: 12px;">
            <h2 style="font-size:16px;font-weight:700;margin-bottom:20px;display:flex;gap:8px;align-items:center;text-transform:uppercase;color:var(--muted);letter-spacing:0.5px;">
                <i class="ph-bold ph-gift" style="color:var(--accent); font-size: 18px;"></i> Premium Benefits
            </h2>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                <div style="background:var(--surface);border:1px solid var(--border);border-radius:12px;padding:16px;">
                    <div style="width:40px;height:40px;background:rgba(245,197,66,.1);border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:12px;">
                        <i class="ph-bold ph-shield-check" style="color:var(--accent);font-size:20px;"></i>
                    </div>
                    <h3 style="font-weight:600;margin-bottom:6px;font-size:14px;color:white;">Fraud Protection</h3>
                    <p style="font-size:12px;color:var(--muted);margin:0;">24/7 active screening</p>
                </div>
                <div style="background:var(--surface);border:1px solid var(--border);border-radius:12px;padding:16px;">
                    <div style="width:40px;height:40px;background:rgba(34,197,94,.1);border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:12px;">
                        <i class="ph-bold ph-coins" style="color:var(--success);font-size:20px;"></i>
                    </div>
                    <h3 style="font-weight:600;margin-bottom:6px;font-size:14px;color:white;">Cashback Rewards</h3>
                    <p style="font-size:12px;color:var(--muted);margin:0;">Earn up to 2% cash back</p>
                </div>
                <div style="background:var(--surface);border:1px solid var(--border);border-radius:12px;padding:16px;">
                    <div style="width:40px;height:40px;background:rgba(245,197,66,.1);border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:12px;">
                        <i class="ph-bold ph-globe" style="color:var(--accent);font-size:20px;"></i>
                    </div>
                    <h3 style="font-weight:600;margin-bottom:6px;font-size:14px;color:white;">Global Access</h3>
                    <p style="font-size:12px;color:var(--muted);margin:0;">Zero foreign transaction fees</p>
                </div>
                <div style="background:var(--surface);border:1px solid var(--border);border-radius:12px;padding:16px;">
                    <div style="width:40px;height:40px;background:rgba(239,68,68,.1);border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:12px;">
                        <i class="ph-bold ph-lock" style="color:var(--danger);font-size:20px;"></i>
                    </div>
                    <h3 style="font-weight:600;margin-bottom:6px;font-size:14px;color:white;">Hardware Secure</h3>
                    <p style="font-size:12px;color:var(--muted);margin:0;">Instant freeze & EMV chip</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Apply Card Modal -->
    <div id="applyCardModal" class="modal">
        <div class="modal-content">
            <div style="width:40px;height:4px;background:var(--border);border-radius:2px;margin:0 auto 20px;"></div>
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;">
                <h2 style="font-size:20px;font-weight:700;margin:0;color:white;">Apply for Card</h2>
                <button id="closeModal" class="icon-btn"><i class="ph-bold ph-x" style="font-size: 16px;"></i></button>
            </div>
            
            <form action="{{ route('crypto.cards.apply') }}" method="POST" style="display:flex;flex-direction:column;gap:20px;">
                @csrf
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Select Wallet Balance</label>
                    <select name="balance" required class="form-control">
                        <option value="">Choose wallet...</option>
                        @foreach($simulatedWallets as $wallet)
                            <option value="{{ $wallet['symbol'] }}">
                                {{ $wallet['name'] }} ({{ $wallet['balance'] }} - ${{ number_format($wallet['usd_value'], 2) }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Card Network Provider</label>
                    <select name="card_type" required class="form-control">
                        <option value="visa">Visa</option>
                        <option value="mastercard">Mastercard</option>
                        <option value="amex">American Express</option>
                        <option value="discover">Discover</option>
                    </select>
                </div>

                <div style="background:rgba(245,197,66,.08);border:1px solid rgba(245,197,66,.2);border-radius:12px;padding:16px;display:flex;gap:12px;align-items:flex-start;">
                    <i class="ph-bold ph-info" style="color:var(--accent);font-size:20px;flex-shrink:0;margin-top:2px;"></i>
                    <p style="font-size:13px;color:var(--muted);margin:0;line-height:1.5;">
                        A minimum of <span style="color:var(--accent);font-weight:600;">$5,000.00</span> in asset balance is required. Your card will be processed and approved <span class="text-white font-semibold">instantly</span>.
                    </p>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="ph-bold ph-paper-plane-tilt" style="font-size: 18px;"></i> Submit Application
                </button>
            </form>
        </div>
    </div>

    <!-- Individual Card Details Modals -->
    @foreach($cards as $card)
        <div id="cardModal{{ $card->id }}" class="modal">
            <div class="modal-content">
                <div style="width:40px;height:4px;background:var(--border);border-radius:2px;margin:0 auto 20px;"></div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;">
                    <h2 style="font-size:20px;font-weight:700;margin:0;color:white;text-transform: capitalize;">{{ $card->card_type }} Details</h2>
                    <button class="icon-btn" onclick="hideCardDetails({{ $card->id }})"><i class="ph-bold ph-x" style="font-size: 16px;"></i></button>
                </div>

                <!-- Premium card mockup -->
                <div style="margin-bottom: 24px;">
                    <div class="card-3d card-{{ $card->card_type }}" style="cursor: default; pointer-events: none;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; width: 100%;">
                            <div class="chip"></div>
                            <span class="status-{{ $card->status === 'active' ? 'active' : 'blocked' }}">
                                {{ strtoupper($card->status) }}
                            </span>
                        </div>
                        
                        <div style="margin: 20px 0 10px; font-size: 20px; font-weight: 700; letter-spacing: 2px; font-family: monospace; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                            {{ $card->card_number }}
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; align-items: flex-end; width: 100%;">
                            <div>
                                <div style="font-size: 9px; text-transform: uppercase; color: rgba(255,255,255,0.6); letter-spacing: 1px; margin-bottom: 2px;">Card Holder</div>
                                <div style="font-size: 13px; font-weight: 600; text-shadow: 0 1px 2px rgba(0,0,0,0.3);">{{ $card->card_holder_name }}</div>
                            </div>
                            <div style="text-align: right; display: flex; flex-direction: column; align-items: flex-end;">
                                <div style="font-size: 9px; text-transform: uppercase; color: rgba(255,255,255,0.6); letter-spacing: 1px; margin-bottom: 2px;">Card Type</div>
                                <div style="font-size: 15px; font-weight: 800; font-style: italic; text-shadow: 0 1px 2px rgba(0,0,0,0.3); text-transform: uppercase;">
                                    {{ $card->card_type }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detailed Parameters Grid -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px; background: var(--surface); border: 1px solid var(--border); padding: 18px; border-radius: 16px;">
                    <div>
                        <div style="font-size: 11px; text-transform: uppercase; color: var(--muted); letter-spacing: 0.5px; margin-bottom: 4px;">Card Balance</div>
                        <div style="font-size: 16px; font-weight: 700; color: white;">${{ number_format($card->balance, 2) }}</div>
                    </div>
                    <div>
                        <div style="font-size: 11px; text-transform: uppercase; color: var(--muted); letter-spacing: 0.5px; margin-bottom: 4px;">Funding Source</div>
                        <div style="font-size: 14px; font-weight: 600; color: white; display: flex; align-items: center; gap: 4px;">
                            <i class="ph-bold ph-wallet" style="color: var(--accent);"></i> {{ $card->wallet_name }}
                        </div>
                    </div>
                    <div style="margin-top: 6px;">
                        <div style="font-size: 11px; text-transform: uppercase; color: var(--muted); letter-spacing: 0.5px; margin-bottom: 4px;">CVV Security</div>
                        <div style="font-size: 14px; font-weight: 700; color: white; font-family: monospace;">{{ $card->cvv }}</div>
                    </div>
                    <div style="margin-top: 6px;">
                        <div style="font-size: 11px; text-transform: uppercase; color: var(--muted); letter-spacing: 0.5px; margin-bottom: 4px;">Expiry Date</div>
                        <div style="font-size: 14px; font-weight: 700; color: white; font-family: monospace;">{{ $card->expiry_date }}</div>
                    </div>
                    <div style="grid-column: span 2; border-top: 1px solid var(--border); padding-top: 12px; margin-top: 6px;">
                        <div style="font-size: 11px; text-transform: uppercase; color: var(--muted); letter-spacing: 0.5px; margin-bottom: 4px;">Billing Address</div>
                        <div style="font-size: 13px; color: var(--text); line-height: 1.4;">
                            {{ auth()->user()->street_address ?? '120 S. Center St' }}, {{ auth()->user()->unit_apartment ?? 'Ste 100' }}<br>
                            {{ auth()->user()->city ?? 'Casper' }}, {{ auth()->user()->postal_code ?? '82601' }}, {{ auth()->user()->country ?? 'United States' }}
                        </div>
                    </div>
                </div>

                <!-- Card Number Copy Button -->
                <button type="button" class="btn btn-primary" onclick="copyCardNumber('{{ $card->card_number }}')" style="background: var(--surface); color: white; border: 1px solid var(--border); margin-bottom: 24px;">
                    <i class="ph-bold ph-copy" style="font-size: 18px;"></i> Copy Card Number
                </button>

                <!-- Transactions Ledger -->
                <div style="margin-bottom: 28px;">
                    <h3 style="font-size: 14px; font-weight: 700; color: white; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center;">
                        <span>Recent Transactions</span>
                        <span style="font-size: 10px; color: var(--muted); font-weight: 500;">LIVE UPDATES</span>
                    </h3>
                    <div style="background: var(--surface); border: 1px solid var(--border); border-radius: 16px; padding: 6px 16px;">
                        @if($card->status === 'blocked')
                            <div style="text-align: center; padding: 24px 10px; color: var(--muted); font-size: 13px;">
                                <i class="ph-bold ph-lock-keyhole" style="font-size: 24px; color: var(--danger); margin-bottom: 8px; display: block; margin-left: auto; margin-right: auto;"></i>
                                Card is currently frozen. Transactions are blocked.
                            </div>
                        @else
                            <div class="tx-row">
                                <div>
                                    <div style="font-size: 13px; font-weight: 600; color: white;">Amazon Prime Member</div>
                                    <div style="font-size: 11px; color: var(--muted); margin-top: 2px;">May 18, 2026 • Recurring</div>
                                </div>
                                <span style="font-size: 13px; font-weight: 700; color: white;">-$14.99</span>
                            </div>
                            <div class="tx-row">
                                <div>
                                    <div style="font-size: 13px; font-weight: 600; color: white;">ATM Cash Withdrawal</div>
                                    <div style="font-size: 11px; color: var(--muted); margin-top: 2px;">May 15, 2026 • ATM Cash</div>
                                </div>
                                <span style="font-size: 13px; font-weight: 700; color: white;">-$100.00</span>
                            </div>
                            <div class="tx-row">
                                <div>
                                    <div style="font-size: 13px; font-weight: 600; color: white;">Spotify Premium Family</div>
                                    <div style="font-size: 11px; color: var(--muted); margin-top: 2px;">May 12, 2026 • Music Service</div>
                                </div>
                                <span style="font-size: 13px; font-weight: 700; color: white;">-$16.99</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Status Toggler Form -->
                <form action="{{ route('crypto.cards.toggle') }}" method="POST">
                    @csrf
                    <input type="hidden" name="card_id" value="{{ $card->id }}">
                    @if($card->status === 'active')
                        <button type="submit" class="btn btn-danger">
                            <i class="ph-bold ph-lock-simple" style="font-size: 18px;"></i> Freeze Card
                        </button>
                    @else
                        <button type="submit" class="btn btn-success">
                            <i class="ph-bold ph-lock-simple-open" style="font-size: 18px;"></i> Activate Card
                        </button>
                    @endif
                </form>
            </div>
        </div>
    @endforeach

    <!-- Bottom Navigation -->
    <div class="bottom-nav">
        <a href="/dashboard" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor">
                <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z"/>
            </svg>
            <span>Home</span>
        </a>
        <a href="#" class="nav-item">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="3"/>
                <path d="M12 1V3M12 21V23M4.22 4.22L5.64 5.64M18.36 18.36L19.78 19.78M1 12H3M21 12H23M4.22 19.78L5.64 18.36M18.36 5.64L19.78 4.22"/>
            </svg>
            <span>Discover</span>
        </a>
        <a href="{{ route('crypto.cards') }}" class="nav-item active">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="currentColor">
                <rect x="1" y="4" width="22" height="16" rx="2"/>
                <path d="M1 10h22"/>
            </svg>
            <span>Cards</span>
        </a>
    </div>

    <!-- JS Logic -->
    <script>
        const applyModal = document.getElementById('applyCardModal');
        const applyBtn   = document.getElementById('applyCardBtn');
        const noCardsBtn = document.getElementById('noCardsApplyBtn');
        const closeBtn   = document.getElementById('closeModal');

        function showModal() {
            applyModal.style.display = 'block';
            document.body.style.overflow = 'hidden';
            setTimeout(() => applyModal.classList.add('show'), 10);
        }
        function hideModal() {
            applyModal.classList.remove('show');
            setTimeout(() => {
                applyModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }, 300);
        }

        if (applyBtn)   applyBtn.addEventListener('click', showModal);
        if (noCardsBtn) noCardsBtn.addEventListener('click', showModal);
        if (closeBtn)   closeBtn.addEventListener('click', hideModal);

        applyModal.addEventListener('click', e => { if (e.target === applyModal) hideModal(); });

        function showCardDetails(cardId) {
            const modal = document.getElementById('cardModal' + cardId);
            if (!modal) return;
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
            setTimeout(() => modal.classList.add('show'), 10);
        }
        function hideCardDetails(cardId) {
            const modal = document.getElementById('cardModal' + cardId);
            if (!modal) return;
            modal.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }, 300);
        }

        // Show toast feedback for success/error flash sessions
        const urlParams = new URLSearchParams(window.location.search);
        const success   = "{{ session('success') }}";
        const error     = "{{ session('error') }}";

        if (success && success.trim().length > 0) {
            showToast(success, 'success');
        }
        if (error && error.trim().length > 0) {
            showToast(error, 'error');
        }

        function showToast(message, type='success') {
            const toast  = document.createElement('div');
            const bg     = type === 'success' ? 'var(--success)' : 'var(--danger)';
            const icon   = type === 'success' ? 'ph-bold ph-check-circle' : 'ph-bold ph-x-circle';
            toast.style.cssText = `
                position:fixed;top:20px;right:20px;background:${bg};
                color:white;padding:16px 20px;border-radius:12px;
                box-shadow:0 8px 32px rgba(0,0,0,.35);display:flex;align-items:center;gap:12px;
                z-index:10000;animation:slideIn .3s ease-out;max-width:90%;
            `;
            toast.innerHTML = `<i class="${icon}" style="font-size:22px;"></i><span style="font-weight:600;font-size:14px;">${message}</span>`;
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.style.animation = 'slideOut .3s ease-out';
                setTimeout(() => toast.remove(), 300);
            }, 4000);
        }

        function copyCardNumber(cardNumber) {
            // Remove spaces from card number to copy cleanly
            const number = cardNumber.replace(/\s+/g, '');
            navigator.clipboard.writeText(number).then(() => {
                showToast('Card number copied to clipboard!', 'success');
            }).catch(() => {
                showToast('Failed to copy card number', 'error');
            });
        }

        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {from{transform:translateX(100%);opacity:0} to{transform:translateX(0);opacity:1}}
            @keyframes slideOut{from{transform:translateX(0);opacity:1} to{transform:translateX(100%);opacity:0}}
        `;
        document.head.appendChild(style);

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                if (applyModal.classList.contains('show')) hideModal();
                document.querySelectorAll('.modal.show').forEach(m => {
                    m.classList.remove('show');
                    setTimeout(() => {
                        m.style.display = 'none';
                        document.body.style.overflow = 'auto';
                    }, 300);
                });
            }
        });
    </script>
</body>
</html>
