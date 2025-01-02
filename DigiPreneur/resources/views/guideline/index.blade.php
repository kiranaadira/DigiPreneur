@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Hero Section -->
    <div class="position-relative mb-5">
        <div class="card border-0 bg-gradient-primary rounded-lg shadow-lg" style="background: linear-gradient(45deg, #0FBAB4, #2C3E50);">
            <div class="card-body p-5 text-white">
                <h1 class="display-4 fw-bold mb-3">Guidelines</h1>
                <p class="lead mb-0">Explore our comprehensive collection of guidelines and documentation to help streamline your processes and ensure best practices.</p>
            </div>
            <div class="position-absolute top-0 end-0 p-4">
                <a href="{{ route('guideline.create') }}" class="btn btn-lg px-4 shadow-sm" style="background-color: #FF6700; color: white;">
                    <i class="bi bi-plus-lg me-2"></i>Create New
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="display-4 fw-bold text-primary mb-2">{{ $guideline->where('status', 'Active')->count() }}</div>
                    <p class="text-muted mb-0">Active Guidelines</p>
                </div>
            </div>
        </div>
        <!-- Add more stat cards as needed -->
    </div>

    <!-- Guidelines Grid -->
    <div class="row g-4">
        @forelse($guideline as $guide)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-hover position-relative overflow-hidden">
                <div class="position-relative">
                    <img src="{{ $guide->image ? asset($guide->image) : 'https://via.placeholder.com/500x300' }}" 
                         class="card-img-top" alt="{{ $guide->title }}" 
                         style="height: 200px; object-fit: cover; filter: brightness(0.9);">
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge rounded-pill" 
                              style="background-color: {{ $guide->status == 'Active' ? '#0FBAB4' : ($guide->status == 'Draft' ? '#FFA500' : '#6c757d') }}">
                            {{ $guide->status }}
                        </span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3" style="color: #2C3E50;">{{ $guide->title }}</h4>
                    <p class="text-muted mb-4">{{ Str::limit($guide->description, 120) }}</p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('guideline.show', $guide->id) }}" 
                           class="btn btn-outline-primary btn-sm px-3">
                            View Details
                        </a>
                        <div class="btn-group">
                            <a href="{{ route('guideline.edit', $guide->id) }}" 
                               class="btn btn-light btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('guideline.destroy', $guide->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-light btn-sm" 
                                        onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="bi bi-journal-x display-1 text-muted mb-3"></i>
                    <h4>No Guidelines Available</h4>
                    <p class="text-muted">Start by creating your first guideline document.</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">
        {{ $guideline->links() }}
    </div>
</div>

<style>
.shadow-hover {
    transition: all 0.3s ease;
}
.shadow-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
}
</style>
@endsection