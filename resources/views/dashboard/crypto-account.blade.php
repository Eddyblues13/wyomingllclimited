<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/images/logo.png" type="image/x-icon" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Account</title>
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
</script>    <style>
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
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg);
            color: var(--text);
        }
        
        .wallet-header {
            background: var(--bg);
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--border);
        }
        
        .profile-card {
            background: var(--surface);
            padding: 24px 20px;
            border-bottom: 1px solid var(--border);
        }
        
        .profile-info {
            display: flex;
            align-items: center;
            gap: 16px;
            cursor: pointer;
        }
        
        .profile-avatar {
            width: 48px;
            height: 48px;
            border-radius: 24px;
            background: var(--surface-2);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .profile-details h2 {
            font-size: 18px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 4px;
        }
        
        .profile-details p {
            font-size: 14px;
            color: var(--muted);
        }
        
        .section-header {
            background: var(--surface);
            padding: 16px 20px 8px;
            font-size: 14px;
            font-weight: 500;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border);
        }
        
        .menu-list {
            background: var(--surface);
            padding-bottom: 100px;
        }
        
        .menu-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            color: inherit;
        }
        
        .menu-item:last-child {
            border-bottom: none;
        }
        
        .menu-item:hover {
            background-color: var(--surface-2);
        }
        
        .menu-item-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .menu-icon {
            width: 40px;
            height: 40px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--surface-2);
        }
        
        .menu-icon svg {
            width: 20px;
            height: 20px;
            color: var(--accent);
        }
        
        .menu-text {
            font-size: 16px;
            font-weight: 500;
            color: var(--text);
        }
        
        .menu-arrow {
            color: var(--muted);
        }
        
        .bottom-nav{position:fixed;left:0;right:0;bottom:0;background:var(--surface);border-top:1px solid var(--border);display:grid;grid-template-columns:repeat(5,1fr);padding:8px 0 10px;}
        .nav-item{display:flex;flex-direction:column;align-items:center;gap:2px;color:var(--muted);text-decoration:none;font-size:12px;padding:6px 0;}
        .nav-item.active{color:#fff;}
        .nav-icon{width:22px;height:22px;color:currentColor;}
        

        
        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(4px);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
            z-index: 50;
            display: flex;
            align-items: flex-end;
            justify-content: center;
        }

        .modal-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-content {
            background: var(--surface);
            width: 100%;
            max-width: 500px;
            border-radius: 24px 24px 0 0;
            padding: 24px 20px 40px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .modal-overlay.active .modal-content {
            transform: translateY(0);
        }
        
        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }
        
        .modal-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--text);
        }
        
        .modal-close {
            color: var(--muted);
            cursor: pointer;
            padding: 4px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: var(--text);
            margin-bottom: 8px;
        }
        
        .form-input {
            width: 100%;
            padding: 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            font-size: 16px;
            background: var(--surface-2);
            color: var(--text);
            transition: all 0.2s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--accent);
            background: var(--bg);
        }
        
        .form-button {
            width: 100%;
            padding: 16px;
            background: var(--accent);
            color: var(--bg);
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 8px;
        }
        
        .form-button:hover {
            background: var(--accent);
            opacity: 0.8;
        }
        
        .form-button:active {
            transform: scale(0.98);
        }
        
        .password-input-container {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--muted);
            cursor: pointer;
            padding: 4px;
        }
        
        .message {
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            margin-top: 12px;
            text-align: center;
        }
        
        .message.success {
            background: var(--success);
            opacity: 0.2;
            color: var(--success);
            border: 1px solid var(--success);
        }
        
        .message.error {
            background: var(--danger);
            opacity: 0.2;
            color: var(--danger);
            border: 1px solid var(--danger);
        }
    </style>
  </head>
  <body>
    <!-- Wallet Header -->
    <div class="wallet-header">
        <div style="display: flex; align-items: center; gap: 12px;">
            <a href="/crypto" style="color: var(--accent);">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M12.7071 4.29289C13.0976 4.68342 13.0976 5.31658 12.7071 5.70711L8.41421 10L12.7071 14.2929C13.0976 14.6834 13.0976 15.3166 12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L6.29289 10.7071C5.90237 10.3166 5.90237 9.68342 6.29289 9.29289L11.2929 4.29289C11.6834 3.90237 12.3166 3.90237 12.7071 4.29289Z"/>
                </svg>
            </a>
        </div>
        <div>
            <span style="font-size: 17px; font-weight: 600; color: var(--text);">Account</span>
        </div>
        <div style="width: 32px;"></div>
    </div>

    <!-- Profile Card -->
    <div class="profile-card">
        <div class="profile-info" id="profileTrigger">
            <div class="profile-avatar">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" style="color: var(--muted);">
                    <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </div>
            <div class="profile-details">
                <h2>{{ auth()->user()->name }}</h2>
                <p>{{ auth()->user()->email }}</p>
            </div>
            <div style="margin-left: auto;">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" style="color: var(--muted);">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Wallet Section -->
    <div class="section-header">Wallet</div>
    <div class="menu-list">
        <a href="{{ route('crypto.receive') }}" class="menu-item">
            <div class="menu-item-left">
                <div class="menu-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 5V19M5 12L12 19L19 12"/>
                    </svg>
                </div>
                <span class="menu-text">Receive</span>
            </div>
            <div class="menu-arrow">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                </svg>
            </div>
        </a>
        <a href="withdraw.php" class="menu-item">
            <div class="menu-item-left">
                <div class="menu-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 19V5M19 12L12 5L5 12"/>
                    </svg>
                </div>
                <span class="menu-text">Send</span>
            </div>
            <div class="menu-arrow">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                </svg>
            </div>
        </a>
        <a href="/crypto/swap" class="menu-item">
            <div class="menu-item-left">
                <div class="menu-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M7 16L17 6M17 6H9M17 6V14"/>
                        <path d="M17 8L7 18M7 18H15M7 18V10"/>
                    </svg>
                </div>
                <span class="menu-text">Swap</span>
            </div>
            <div class="menu-arrow">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                </svg>
            </div>
        </a>
        <a href="{{ route('crypto.buy') }}" class="menu-item">
            <div class="menu-item-left">
                <div class="menu-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"/>
                        <circle cx="20" cy="21" r="1"/>
                        <path d="M1 1H5L7.68 14.39A2 2 0 0 0 9.65 16H19.4A2 2 0 0 0 21.36 14.39L23 6H6"/>
                    </svg>
                </div>
                <span class="menu-text">Buy & Sell Crypto</span>
            </div>
            <div class="menu-arrow">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                </svg>
            </div>
        </a>
        <a href="cards.php" class="menu-item">
            <div class="menu-item-left">
                <div class="menu-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                        <line x1="1" y1="10" x2="23" y2="10"/>
                    </svg>
                </div>
                <span class="menu-text">Cards</span>
            </div>
            <div class="menu-arrow">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                </svg>
            </div>
        </a>
    </div>

    <!-- Settings Section -->
    <div class="section-header">Settings</div>
    <div class="menu-list">
        <a href="tickets.php" class="menu-item">
            <div class="menu-item-left">
                <div class="menu-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z"/>
                    </svg>
                </div>
                <span class="menu-text">Support Tickets</span>
            </div>
            <div class="menu-arrow">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                </svg>
            </div>
        </a>
      
        <a href="{{ route('crypto.link-wallet') }}" class="menu-item">
            <div class="menu-item-left">
                <div class="menu-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="10" rx="2" ry="2"/>
                        <circle cx="12" cy="16" r="1"/>
                        <path d="M7 11V7C7 5.67392 7.52678 4.40215 8.46447 3.46447C9.40215 2.52678 10.6739 2 12 2C13.3261 2 14.5979 2.52678 15.5355 3.46447C16.4732 4.40215 17 5.67392 17 7V11"/>
                    </svg>
                </div>
                <span class="menu-text">Backup Wallet</span>
            </div>
            <div class="menu-arrow">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                </svg>
            </div>
        </a>
       
        <div id="resetPasswordTrigger" class="menu-item">
            <div class="menu-item-left">
                <div class="menu-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M12 1V3M12 21V23M4.22 4.22L5.64 5.64M18.36 18.36L19.78 19.78M1 12H3M21 12H23M4.22 19.78L5.64 18.36M18.36 5.64L19.78 4.22"/>
                    </svg>
                </div>
                <span class="menu-text">Reset Password</span>
            </div>
            <div class="menu-arrow">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                </svg>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
            @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-item">
            <div class="menu-item-left">
                <div class="menu-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="10" rx="2" ry="2"/>
                        <circle cx="12" cy="16" r="1"/>
                        <path d="M7 11V7C7 5.67392 7.52678 4.40215 8.46447 3.46447C9.40215 2.52678 10.6739 2 12 2C13.3261 2 14.5979 2.52678 15.5355 3.46447C16.4732 4.40215 17 5.67392 17 7V11"/>
                    </svg>
                </div>
                <span class="menu-text">Logout</span>
            </div>
            <div class="menu-arrow">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                </svg>
            </div>
        </a>
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
        <a href="/crypto/swap" class="nav-item">
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
        <a href="/crypto/account" class="nav-item active">
            <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="3" width="18" height="14" rx="2"/>
                <path d="M8 21h8M12 17v4"/>
            </svg>
            <span>Account</span>
        </a>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal-overlay editEmailModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Edit Profile</h2>
                <div class="modal-close editEmailModalCloseButton">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </div>
            </div>
            
            <form id="editEmailForm" method="POST">
                <div class="form-group">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" value="{{ explode(' ', auth()->user()->name)[0] }}" 
                           class="form-input" />
                </div>
                <div class="form-group">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" value="{{ count(explode(' ', auth()->user()->name)) > 1 ? explode(' ', auth()->user()->name)[1] : '' }}" 
                           class="form-input" />
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" 
                           class="form-input" readonly/>
                </div>
                <button type="submit" class="form-button">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

    <!-- Reset Password Modal -->
    <div class="modal-overlay resetPasswordModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Reset Password</h2>
                <div class="modal-close resetPasswordModalCloseButton">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"/>
                        <line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </div>
            </div>
            
            <form id="resetPasswordForm">
                <div class="form-group">
                    <label class="form-label">New Password</label>
                    <div class="password-input-container">
                        <input type="password" name="new_password" required class="form-input" />
                        <button type="button" class="password-toggle passwordShow">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12S5 4 12 4S23 12 23 12S19 20 12 20S1 12 1 12Z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <div class="password-input-container">
                        <input type="password" name="confirm_password" required class="form-input" />
                        <button type="button" class="password-toggle passwordShow">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12S5 4 12 4S23 12 23 12S19 20 12 20S1 12 1 12Z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <button type="submit" class="form-button">
                    Update Password
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Edit Profile Modal
            const editModal = document.querySelector('.editEmailModal');
            const profileTrigger = document.getElementById('profileTrigger');
            const editCloseButton = document.querySelector('.editEmailModalCloseButton');
            const editForm = document.getElementById('editEmailForm');

            profileTrigger.addEventListener('click', () => {
                editModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            editCloseButton.addEventListener('click', () => {
                editModal.classList.remove('active');
                document.body.style.overflow = '';
            });

            editForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                // Remove any existing messages
                const existingMessages = this.querySelectorAll('.message');
                existingMessages.forEach(msg => msg.remove());

                fetch('api/edit_user.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    const messageDiv = document.createElement('div');
                    messageDiv.classList.add('message');
                    
                    if (data.success) {
                        messageDiv.classList.add('success');
                        messageDiv.textContent = 'Profile updated successfully';
                        setTimeout(() => {
                            editModal.classList.remove('active');
                            document.body.style.overflow = '';
                            location.reload();
                        }, 1500);
                    } else {
                        messageDiv.classList.add('error');
                        messageDiv.textContent = data.error || 'Failed to update profile';
                    }
                    this.appendChild(messageDiv);
                })
                .catch(error => {
                    const messageDiv = document.createElement('div');
                    messageDiv.classList.add('message', 'error');
                    messageDiv.textContent = 'An error occurred. Please try again.';
                    this.appendChild(messageDiv);
                });
            });

            // Reset Password Modal
            const resetModal = document.querySelector('.resetPasswordModal');
            const resetTrigger = document.getElementById('resetPasswordTrigger');
            const resetCloseButton = document.querySelector('.resetPasswordModalCloseButton');
            const resetForm = document.getElementById('resetPasswordForm');

            resetTrigger.addEventListener('click', () => {
                resetModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });

            resetCloseButton.addEventListener('click', () => {
                resetModal.classList.remove('active');
                document.body.style.overflow = '';
            });

            // Password visibility toggle
            document.querySelectorAll('.passwordShow').forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const input = this.closest('.password-input-container').querySelector('input');
                    if (input.type === 'password') {
                        input.type = 'text';
                        this.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20C7 20 3 12 3 12A18.45 18.45 0 0 1 8.06 6.06M9.9 4.24A9.12 9.12 0 0 1 12 4C17 4 21 12 21 12A18.5 18.5 0 0 1 18.84 15.16M14.12 14.12A3 3 0 1 1 9.88 9.88"/><line x1="1" y1="1" x2="23" y2="23"/></svg>';
                    } else {
                        input.type = 'password';
                        this.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12S5 4 12 4S23 12 23 12S19 20 12 20S1 12 1 12Z"/><circle cx="12" cy="12" r="3"/></svg>';
                    }
                });
            });

            resetForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                // Remove any existing messages
                const existingMessages = this.querySelectorAll('.message');
                existingMessages.forEach(msg => msg.remove());

                if (formData.get('new_password') !== formData.get('confirm_password')) {
                    const messageDiv = document.createElement('div');
                    messageDiv.classList.add('message', 'error');
                    messageDiv.textContent = 'Passwords do not match';
                    this.appendChild(messageDiv);
                    return;
                }

                fetch('api/reset_password.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    const messageDiv = document.createElement('div');
                    messageDiv.classList.add('message');
                    
                    if (data.success) {
                        messageDiv.classList.add('success');
                        messageDiv.textContent = 'Password updated successfully';
                        setTimeout(() => {
                            resetModal.classList.remove('active');
                            document.body.style.overflow = '';
                            this.reset();
                        }, 1500);
                    } else {
                        messageDiv.classList.add('error');
                        messageDiv.textContent = data.error || 'Failed to update password';
                    }
                    this.appendChild(messageDiv);
                })
                .catch(error => {
                    const messageDiv = document.createElement('div');
                    messageDiv.classList.add('message', 'error');
                    messageDiv.textContent = 'An error occurred. Please try again.';
                    this.appendChild(messageDiv);
                });
            });

            // Close modals when clicking outside
            [editModal, resetModal].forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                });
            });
        });
    </script>
        <script>
            function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
            }, 'google_translate_element');
        }
    </script>

    
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
  </body>
</html>
