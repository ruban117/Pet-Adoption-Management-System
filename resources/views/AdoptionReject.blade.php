<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Rejection</title>
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
        <h2>Adoption Rejection</h2>
        <p>Dear {{$adaptor}},</p>
        <p>We regret to inform you that your adoption request for the following pet has been declined:</p>
        <ul>
            <li><strong>Pet Name:</strong> {{$pet}}</li>
        </ul>
        <p>After careful consideration, we have determined that {{$pet}} may not be the best fit for your current living situation.</p>
        <p>We appreciate your interest in adopting from us and encourage you to continue your search for the perfect pet companion.</p>
        <p>Thank you for your understanding.</p>
        <p>Best regards,</p>
        <p>Furever Family Finder</p>
    </div>
</body>
</html>
