@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #0FBAB4;">Pusat Sumber Daya dan Tutorial Online</h2>
        <a href="{{ route('articles.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Artikel
        </a>
    </div>

    <!-- Description Section -->
    <div class="card shadow-sm p-4 mb-4" style="background-color: #f8f9fa;">
        <p class="text-muted mb-0">
            Koleksi tutorial online berupa video dan artikel yang mengajarkan UMKM berbagai keterampilan digital, seperti membuat situs web, mengoptimalkan SEO, dan mengelola media sosial.
        </p>
    </div>

    <!-- Filter Section -->
    <div class="card shadow-sm p-4 mb-4" style="background-color: #f8f9fa;">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Kategori</label>
                <select class="form-select" onchange="filterResults('category', this.value)">
                    <option value="">Semua</option>
                    <option value="Membuat Situs Web" {{ request('category') == 'Membuat Situs Web' ? 'selected' : '' }}>Membuat Situs Web</option>
                    <option value="Optimasi SEO" {{ request('category') == 'Optimasi SEO' ? 'selected' : '' }}>Optimasi SEO</option>
                    <option value="Manajemen Media Sosial" {{ request('category') == 'Manajemen Media Sosial' ? 'selected' : '' }}>Manajemen Media Sosial</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Tipe Konten</label>
                <select class="form-select" onchange="filterResults('type', this.value)">
                    <option value="">Semua</option>
                    <option value="video" {{ request('type') == 'video' ? 'selected' : '' }}>Video</option>
                    <option value="article" {{ request('type') == 'article' ? 'selected' : '' }}>Artikel</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Urutan</label>
                <select class="form-select" onchange="filterResults('sort', this.value)">
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Terbaru</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Terlama</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Article List -->
    <div class="row">
        @forelse($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0" style="background-color: #ffffff;">
                    <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://via.placeholder.com/500x300' }}" 
                         class="card-img-top rounded" alt="{{ $article->title }}" style="object-fit: cover; height: 180px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold" style="color: #0FBAB4;">{{ $article->title }}</h5>
                        <p class="text-muted">{{ Str::limit($article->description, 100) }}</p>
                        <p class="text-secondary mb-2">
                            <i class="bi bi-file-earmark-text text-primary me-1"></i> {{ ucfirst($article->type) }}
                        </p>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus artikel ini?');">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Tidak ada artikel yang tersedia.</p>
            </div>
        @endforelse
    </div>
</div>

<script>
    function filterResults(key, value) {
        const url = new URL(window.location.href);
        url.searchParams.set(key, value);
        window.location.href = url.toString();
    }
</script>
@endsection
