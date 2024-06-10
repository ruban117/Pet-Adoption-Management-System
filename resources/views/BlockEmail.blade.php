<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Blocking Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Block Notification</h2>
        <p>Dear {{$m}},</p>
        <p>We regret to inform you that we have decided to block you from our services due to the following reasons:</p>
        <p>This decision is final and irreversible. You will no longer have access to our services.</p>
        <p>If you have any questions or wish to appeal this decision, please contact our support team.</p>
        <p>Thank you for your understanding.</p>
        <p>Best regards,</p>
        <p>Furever Family Finder</p>
    </div>
</body>
</html>
