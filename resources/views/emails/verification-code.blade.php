<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f9fafb; color: #1f2937; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .card { background-color: #ffffff; border-radius: 8px; padding: 32px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); text-align: center; }
        .logo { max-width: 150px; margin-bottom: 24px; }
        .code-box { background-color: #f3f4f6; border-radius: 8px; padding: 24px; margin: 24px 0; font-size: 32px; font-weight: bold; letter-spacing: 8px; color: #1e3a8a; }
        .footer { text-align: center; margin-top: 24px; color: #6b7280; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Your Verification Code</h2>
            <p>Hi {{ $user->name }},</p>
            <p>Please use the following 4-digit code to verify your email address and complete your registration.</p>
            
            <div class="code-box">
                {{ $code }}
            </div>
            
            <p style="color: #6b7280; font-size: 14px;">This code will expire in 15 minutes.</p>
            <p>If you did not request this code, you can safely ignore this email.</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Wyoming LLC Attorney. All rights reserved.
        </div>
    </div>
</body>
</html>
