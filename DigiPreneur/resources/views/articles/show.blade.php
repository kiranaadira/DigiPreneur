@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-light rounded p-3">
            <li class="breadcrumb-item"><a href="/articles" class="text-primary">Articles</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
        </ol>
    </nav>

    <!-- Tombol Back -->
    <div class="mb-4">
        <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <!-- Detail Article -->
    <div class="row">
        <!-- Thumbnail -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <img src="{{ $article->thumbnail ? asset($article->thumbnail) : 'https://via.placeholder.com/500x300' }}" class="card-img-top rounded" alt="{{ $article->title }}">
            </div>
        </div>

        <!-- Informasi Detail -->
        <div class="col-md-6">
            <h2 class="fw-bold" style="color: #0FBAB4;">{{ $article->title }}</h2>
            <p class="text-muted mb-3">Category: {{ $article->category }}</p>

            <!-- Tipe dan Status -->
            <div class="mb-3">
                <p class="mb-1">
                    <i class="bi bi-tag text-primary me-2"></i>
                    <strong>Type:</strong> {{ ucfirst($article->type) }}
                </p>
                <p>
                    <i class="bi bi-info-circle text-primary me-2"></i>
                    <strong>Status:</strong> {{ ucfirst($article->status) }}
                </p>
            </div>

            <!-- Tanggal Publikasi -->
            <div class="mb-3">
                <p>
                    <i class="bi bi-calendar-event text-primary me-2"></i>
                    <strong>Published At:</strong> {{ $article->published_at ? $article->published_at->format('d M Y, H:i') : 'Not Published' }}
                </p>
            </div>

            <!-- Penulis -->
            <div class="mb-3">
                <p>
                    <i class="bi bi-person text-primary me-2"></i>
                    <strong>Author:</strong> {{ $article->author }}
                </p>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this article?');">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </form>
                <!-- Tombol Download PDF -->
                <a href="{{ route('articles.pdf', $article->id) }}" class="btn btn-outline-primary btn-sm px-3">
                    <i class="bi bi-file-earmark-pdf"></i> Download PDF
                </a>
            </div>
        </div>
    </div>

    <!-- Deskripsi -->
    <div class="mt-5">
        <h4 class="fw-bold" style="color: #0FBAB4;">Content</h4>
        <p class="text-muted">{!! nl2br(e($article->content)) !!}</p>
    </div>

    <!-- URL -->
    @if($article->url)
        <div class="mt-3">
            <h5 class="fw-bold" style="color: #0FBAB4;">Resource Link</h5>
            <a href="{{ $article->url }}" class="btn btn-outline-primary btn-sm px-3" target="_blank">
                <i class="fab fa-youtube"></i>Klik disini untuk membuka link
            </a>
        </div>
    @endif
</div>
@endsection