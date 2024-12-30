@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="fw-bold" style="color: #0FBAB4;">Add an Article</h2>
    <p>Pusat Sumber Daya dan Tutorial Online, Koleksi tutorial online berupa video, artikel, dan panduan interaktif yang mengajarkan UMKM berbagai keterampilan digital, seperti membuat situs web, mengoptimalkan SEO, dan mengelola media sosial.</p>
    <div class="card shadow-sm p-4" style="background-color: #f8f9fa;">
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Content</label>
                <textarea name="content" class="form-control" rows="6" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Type</label>
                <select name="type" class="form-select" required>
                    <option value="" disabled selected>Choose Type</option>
                    <option value="video">Video</option>
                    <option value="article">Article</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">URL (Optional for Videos or Guides)</label>
                <input type="url" name="url" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Category</label>
                <select name="category" class="form-select" required>
                    <option value="" disabled selected>Choose Category</option>
                    <option value="web">Membuat Situs Web</option>
                    <option value="seo">Optimasi SEO</option>
                    <option value="social">Manajemen Media Sosial</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Status</label>
                <select name="status" class="form-select" required>
                    <option value="" disabled selected>Choose Status</option>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Published Date</label>
                <input type="datetime-local" name="published_at" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Author</label>
                <input type="text" name="author" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Thumbnail Image</label>
                <input type="file" name="thumbnail" class="form-control">
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">Back</a>
                <button type="submit" class="btn" style="background-color: #FF6700; color: white;">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
