<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Email - Furever Family Finder</title>
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 32rem;
            margin: 0 auto;
            padding: 2rem;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            padding: 2rem;
            margin-bottom: 1rem;
        }

        .title {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
        }

        .otp-container {
            background-color: #edf2f7;
            padding: 1rem;
            border-radius: 0.5rem;
            text-align: center;
            margin-bottom: 1rem;
        }

        .otp {
            font-size: 2rem;
            font-weight: bold;
            color: #2d3748;
        }

        .text {
            text-align: center;
            margin-bottom: 1rem;
            color: #4a5568;
        }

        .footer {
            text-align: center;
            color: #718096;
            font-size: 0.875rem;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1 class="title">Furever Family Finder</h1>
            <p class="text">Your One-Time Password (OTP) is:</p>
            <div class="otp-container">
                <span class="otp">{{ $otp }}</span>
            </div>
            <p class="text">Please use the above OTP to complete your action on Furever Family Finder. This OTP is valid for 5 minutes.</p>
        </div>
        <p class="footer">This email was sent to you because you are a registered member of Furever Family Finder. If you did not request this OTP, please ignore this email.</p>
    </div>
</body>
</html>
