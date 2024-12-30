@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="fw-bold" style="color: #0FBAB4;">Edit Article</h2>
    <p>Pusat Sumber Daya dan Tutorial Online, Koleksi tutorial online berupa video, artikel, dan panduan interaktif yang mengajarkan UMKM berbagai keterampilan digital, seperti membuat situs web, mengoptimalkan SEO, dan mengelola media sosial.</p>
    <div class="card shadow-sm p-4" style="background-color: #f8f9fa;">
        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Content</label>
                <textarea name="content" class="form-control" rows="6" required>{{ $article->content }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Type</label>
                <select name="type" class="form-select" required>
                    <option value="video" {{ $article->type == 'video' ? 'selected' : '' }}>Video</option>
                    <option value="article" {{ $article->type == 'article' ? 'selected' : '' }}>Article</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">URL (Optional for Videos or Guides)</label>
                <input type="url" name="url" class="form-control" value="{{ $article->url }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Category</label>
                <select name="category" class="form-select" required>
                    <option value="Membuat Situs Web" {{ $article->category == 'Membuat Situs Web' ? 'selected' : '' }}>Membuat Situs Web</option>
                    <option value="Optimasi SEO" {{ $article->category == 'Optimasi SEO' ? 'selected' : '' }}>Optimasi SEO</option>
                    <option value="Manajemen Media Sosial" {{ $article->category == 'Manajemen Media Sosial' ? 'selected' : '' }}>Manajemen Media Sosial</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Status</label>
                <select name="status" class="form-select" required>
                    <option value="draft" {{ $article->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $article->status == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Published Date</label>
                <input type="datetime-local" name="published_at" class="form-control" value="{{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('Y-m-d\TH:i') : '' }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Author</label>
                <input type="text" name="author" class="form-control" value="{{ $article->author }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Thumbnail Image</label>
                <input type="file" name="thumbnail" class="form-control">
                @if($article->thumbnail)
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" class="mt-3 rounded" style="width: 150px;">
                @endif
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">Back</a>
                <button type="submit" class="btn" style="background-color: #FF6700; color: white;">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
