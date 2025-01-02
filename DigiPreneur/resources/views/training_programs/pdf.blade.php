<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $program->title }} - PDF</title>
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
        <h1>{{ $program->title }}</h1>
        <p><strong>Location:</strong> {{ $program->Location }}</p>
    </div>

    <!-- Thumbnail -->
    @if($program->image)
        <div class="image">
            <img src="{{ asset($program->image) }}" alt="{{ $program->title }}">
        </div>
    @endif

    <!-- program Details -->
    <div class="details">
        <p><strong>Price:</strong> {{ ucfirst($program->price) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($program->status) }}</p>
        <p><strong>Date:</strong> {{ ucfirst($program->start_date) }} until {{ ucfirst($program->end_date) }}</p>
        <p><strong>Time:</strong> {{ ucfirst($program->start_time) }} - {{ ucfirst($program->end_time) }}</p>
    </div>

    <!-- Content -->
    <div class="desctription">
        <h2>Description</h2>
        <p>{!! nl2br(e($program->description)) !!}</p>
    </div>
</body>
</html>
