<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $guideline->title }} - PDF</title>
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
        <h1 class="fw-bold mb-4" style="color: #2C3E50;">
            <i class="bi bi-book me-2"></i>UMKM Guidelines
        </h1>
    </div>

    <!-- Thumbnail -->
    @if($guideline->image)
        <div class="thumbnail">
            <h1>{{ $guideline->title }}</h1>
            <img src="{{ asset($guideline->image) }}" alt="{{ $guideline->title }}">
        </div>
    @endif

    <!-- Guideline Details -->
    <div class="details">
        <i><strong>Description:</strong></i>
        <p>{{ $guideline->description }}</p>
        <i><strong>Status:</strong> {{ ucfirst($guideline->status) }}</i>
    </div>
</body>
</html>
