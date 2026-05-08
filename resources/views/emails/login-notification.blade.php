<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f9fafb; color: #1f2937; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .card { background-color: #ffffff; border-radius: 8px; padding: 32px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .alert-box { border-left: 4px solid #f59e0b; background-color: #fef3c7; padding: 16px; margin: 24px 0; border-radius: 0 4px 4px 0; }
        .footer { text-align: center; margin-top: 24px; color: #6b7280; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>New Login Detected</h2>
            <p>Hi {{ $user->name }},</p>
            <p>We noticed a new login to your Wyoming LLC Attorney account.</p>
            
            <div class="alert-box">
                <p style="margin: 0 0 8px 0;"><strong>Time:</strong> {{ now()->format('F j, Y, g:i a') }}</p>
                <p style="margin: 0 0 8px 0;"><strong>IP Address:</strong> {{ $ipAddress }}</p>
                <p style="margin: 0; font-size: 13px; color: #4b5563;"><strong>Device/Browser:</strong> {{ $userAgent }}</p>
            </div>
            
            <p>If this was you, you can safely ignore this email.</p>
            <p><strong>Not you?</strong> Please change your password immediately or contact our support team.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Wyoming LLC Attorney. All rights reserved.
        </div>
    </div>
</body>
</html>
