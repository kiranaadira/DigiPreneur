@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color: #0FBAB4;">Training Programs For UMKM</h2>
        <a href="{{ route('training_programs.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Add Programs
        </a>
    </div>

    <!-- Filter Section -->
    <div class="card shadow-sm p-4 mb-4" style="background-color: #f8f9fa;">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Location</label>
                <select class="form-select" onchange="filterResults('location', this.value)">
                    <option value="">All</option>
                    <option value="Online" {{ request('location') == 'Online' ? 'selected' : '' }}>Online</option>
                    <option value="Offline" {{ request('location') == 'Offline' ? 'selected' : '' }}>Offline</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Price</label>
                <select class="form-select" onchange="filterResults('price', this.value)">
                    <option value="">All</option>
                    <option value="paid" {{ request('price') == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="free" {{ request('price') == 'free' ? 'selected' : '' }}>Free</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Order</label>
                <select class="form-select" onchange="filterResults('sort', this.value)">
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Starting Date (Nearest)</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Starting Date (Longest)</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Program List -->
    <div class="row">
        @forelse($programs as $program)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0" style="background-color: #ffffff;">
                    <img src="{{ $program->image ? asset($program->image) : 'https://via.placeholder.com/500x300' }}" 
                         class="card-img-top rounded" alt="{{ $program->title }}" style="object-fit: cover; height: 180px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold" style="color: #0FBAB4;">{{ $program->title }}</h5>
                        <p class="text-muted">{{ Str::limit($program->description, 100) }}</p>
                        <p class="text-secondary mb-2">
                            <i class="bi bi-geo-alt text-primary me-1"></i> {{ $program->location }}
                            @if($program->location == 'Offline')
                                - {{ $program->venue }}
                            @endif
                        </p>
                        <h6 class="fw-bold text-success mb-3">
                            {{ $program->price == 0 ? 'Gratis' : 'Rp' . number_format($program->price, 0, ',', '.') }}
                        </h6>
                        <a href="{{ route('training_programs.show', $program->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('training_programs.edit', $program->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('training_programs.destroy', $program->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this program?');">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">There are no training programs available.</p>
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
