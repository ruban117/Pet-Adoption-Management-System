<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Acceptance</title>
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
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>PAMS Adoption Acceptance</h2>
        <p>Dear {{$adaptor}},</p>
        <p>We are delighted to inform you that your adoption request for the following pet has been accepted:</p>
        <ul>
            <li><strong>Pet Name:</strong> {{$pet}}</li>
        </ul>
        <p>We believe that you will provide a loving and caring home for {{$pet}}.</p>
        <p>Please find attached the adoption agreement form. Kindly review and sign the form, and return it to us at your earliest convenience.</p>
        <p>Once we receive the signed agreement, we will arrange for the finalization of the adoption process.</p>
        <p>Thank you for choosing to adopt from us. We appreciate your support for our mission.</p>
        <p>Warm regards,</p>
        <p>Furever Family Finder</p>
    </div>
</body>
</html>
