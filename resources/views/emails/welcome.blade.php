<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f9fafb; color: #1f2937; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .card { background-color: #ffffff; border-radius: 8px; padding: 32px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .btn { display: inline-block; background-color: #1e3a8a; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-weight: bold; margin-top: 16px; }
        .footer { text-align: center; margin-top: 24px; color: #6b7280; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 style="color: #1e3a8a;">Welcome to Wyoming LLC Attorney!</h2>
            <p>Hi {{ $user->name }},</p>
            <p>Thank you for verifying your email address. Your account is now active, and your company formation application is being processed.</p>
            <p>You can track the status of your application and manage your business from your dashboard.</p>
            
            <div style="text-align: center; margin: 32px 0;">
                <a href="{{ url('/dashboard') }}" class="btn">Go to Dashboard</a>
            </div>
            
            <p>If you have any questions, our support team is always here to help.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Wyoming LLC Attorney. All rights reserved.
        </div>
    </div>
</body>
</html>
