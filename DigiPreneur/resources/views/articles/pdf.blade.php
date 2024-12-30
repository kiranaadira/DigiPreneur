<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - PDF</title>
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
        <h1>{{ $article->title }}</h1>
        <p><strong>Category:</strong> {{ $article->category }}</p>
    </div>

    <!-- Thumbnail -->
    @if($article->thumbnail)
        <div class="thumbnail">
            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->title }}">
        </div>
    @endif

    <!-- Article Details -->
    <div class="details">
        <p><strong>Type:</strong> {{ ucfirst($article->type) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($article->status) }}</p>
        <p><strong>Published At:</strong> 
            {{ $article->published_at ? $article->published_at->format('d M Y, H:i') : 'Not Published' }}
        </p>
        <p><strong>Author:</strong> {{ $article->author }}</p>
    </div>

    <!-- Content -->
    <div class="content">
        <h2>Content</h2>
        <p>{!! nl2br(e($article->content)) !!}</p>
    </div>

    <!-- Resource Link -->
    @if($article->url)
        <div class="url">
            <h3>Resource Link</h3>
            <p><a href="{{ $article->url }}" target="_blank">{{ $article->url }}</a></p>
        </div>
    @endif
</body>
</html>
