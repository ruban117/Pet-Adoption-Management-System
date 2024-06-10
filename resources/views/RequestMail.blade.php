<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Request</title>
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
        <h2>PAMS Adoption Request</h2>
        <p>Dear {{$donor}},</p>
        <p>I hope this email finds you well. I am writing to express my interest in adopting a pet from your organization.</p>
        <p>After careful consideration, I have decided to request the adoption of the following pet:</p>
        <ul>
            <li><strong>Pet Name:</strong> {{$pet}}</li>
        </ul>
        <p>I have attached all the necessary documents and filled out the adoption application form. I am more than willing to provide any additional information required.</p>
        <p>Please let me know the next steps in the adoption process. I am looking forward to hearing from you soon.</p>
        <p>Thank you for your time and consideration.</p>
        <p>Sincerely,<br>{{$adaptor}}</p>
    </div>
</body>
</html>
