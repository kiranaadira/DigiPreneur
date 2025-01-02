<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $customer->name }} - PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        .header {
            text-align: center;
            color: #0FBAB4;
        }
        .thumbnail {
            text-align: center;
            margin: 20px 0;
        }
        .thumbnail img {
            max-width: 100%;
            height: auto;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        .content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>{{ $customer->name }}</h1>
    </div>

    <!-- Article Details -->
    <div class="details">
        <p><strong>Email:</strong> {{ ucfirst($customer->email) }}</p>
        <p><strong>Phone:</strong> {{ ucfirst($customer->phone) }}</p>
        <p><strong>Published At:</strong> 
            {{ $customer->created_at ? $customer->created_at->format('d M Y, H:i') : 'Not Published' }}
        </p>
    </div>

    <!-- Content -->
    <div class="content">
        <h2>Message</h2>
        <p>{!! nl2br(e($customer->message)) !!}</p>
    </div>
</body>
</html>
