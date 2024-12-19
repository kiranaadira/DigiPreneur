@extends('layouts.app')

@section('title', 'Program Pelatihan UMKM')

@section('content')
<div class="container mt-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Program Pelatihan UMKM</h2>
        <a href="{{ route('training_programs.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Program
        </a>
    </div>

    <!-- Filter Section -->
    <div class="card shadow-sm p-3 mb-4">
        <div class="row g-3 align-items-center">
            <div class="col-md-3">
                <label class="form-label fw-bold">Lokasi</label>
                <select class="form-select" onchange="filterResults('location', this.value)">
                    <option value="">Semua</option>
                    <option value="Online" {{ request('location') == 'Online' ? 'selected' : '' }}>Online</option>
                    <option value="Offline" {{ request('location') == 'Offline' ? 'selected' : '' }}>Offline</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Harga</label>
                <select class="form-select" onchange="filterResults('price', this.value)">
                    <option value="">Semua</option>
                    <option value="paid" {{ request('price') == 'paid' ? 'selected' : '' }}>Berbayar</option>
                    <option value="free" {{ request('price') == 'free' ? 'selected' : '' }}>Gratis</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold">Urutan</label>
                <select class="form-select" onchange="filterResults('sort', this.value)">
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Waktu Mulai (Terdekat)</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Waktu Mulai (Terlama)</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Program List -->
    <div class="row">
        @forelse($programs as $program)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <!-- Gambar Program -->
                    <img src="{{ $program->image ? asset('storage/' . $program->image) : 'https://via.placeholder.com/500x300' }}" 
                         class="card-img-top" alt="Program Image" style="object-fit: cover; height: 180px;">

                    <!-- Body Card -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $program->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($program->description, 100) }}</p>
                        <p class="text-secondary mb-2">
                            <i class="bi bi-geo-alt me-1"></i> 
                            {{ $program->location }} 
                            @if($program->location == 'Offline')
                                - {{ $program->venue }}
                            @endif
                        </p>

                        <!-- Harga -->
                        <h6 class="fw-bold text-success mb-3">
                            {{ $program->price == 0 ? 'Gratis' : 'Rp' . number_format($program->price, 0, ',', '.') }}
                        </h6>

                        <!-- Tombol Aksi -->
                        <div class="mt-auto d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-eye me-1"></i>Detail</a>
                            <div>
                                <a href="{{ route('training_programs.edit', $program->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('training_programs.destroy', $program->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus program ini?');">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Tidak ada program pelatihan yang tersedia.</p>
            </div>
        @endforelse
    </div>
</div>

<!-- Script untuk Filter -->
<script>
    function filterResults(key, value) {
        const url = new URL(window.location.href);
        url.searchParams.set(key, value);
        window.location.href = url.toString();
    }
</script>
@endsection
