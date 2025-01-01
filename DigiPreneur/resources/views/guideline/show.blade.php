@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('guideline.index') }}" class="text-decoration-none">Guidelines</a></li>
            <li class="breadcrumb-item active">{{ $guideline->title }}</li>
        </ol>
    </nav>

    <div class="card border-0 shadow-lg mb-5">
        <div class="row g-0">
            <!-- Image Section -->
            <div class="col-md-5">
                <div class="position-relative h-100">
                    <img src="{{ $guideline->image ? asset('storage/' . $guideline->image) : 'https://via.placeholder.com/500x500' }}" 
                         class="w-100 h-100" style="object-fit: cover;" alt="{{ $guideline->title }}">
                    <div class="position-absolute top-0 start-0 m-3">
                        <span class="badge rounded-pill" 
                              style="background-color: {{ $guideline->status == 'Active' ? '#0FBAB4' : ($guideline->status == 'Draft' ? '#FFA500' : '#6c757d') }}">
                            {{ $guideline->status }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="col-md-7">
                <div class="card-body p-4">
                    <h2 class="display-6 fw-bold mb-4" style="color: #2C3E50;">{{ $guideline->title }}</h2>

                    <div class="mb-4">
                        <h6 class="text-muted mb-3">Last Updated</h6>
                        <p class="fs-5">{{ $guideline->updated_at->format('F d, Y') }}</p>
                    </div>

                    <div class="d-flex gap-2 mt-5">
                        <a href="{{ route('guideline.edit', $guideline->id) }}" 
                           class="btn btn-warning px-4">
                            <i class="bi bi-pencil me-2"></i>Edit
                        </a>
                        <form action="{{ route('guideline.destroy', $guideline->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-4" 
                                    onclick="return confirm('Are you sure you want to delete this guideline?')">
                                <i class="bi bi-trash me-2"></i>Delete
                            </button>
                        </form>
                        <a href="{{ route('guideline.index') }}" 
                           class="btn btn-light px-4 ms-auto">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Description Section with Improved Styling -->
    <div class="card border-0 shadow-lg mb-5">
        <div class="card-body p-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h3 class="fw-bold mb-4" style="color: #2C3E50;">
                        <i class="bi bi-book me-2"></i>UMKM Guidelines
                    </h3>
                    
                    <div class="guideline-content">
                        <div class="description-content fs-5">
                            {!! preg_replace('/\n{2,}/', '</p><p>', nl2br(e($guideline->description))) !!}
                        </div>

                        <!-- Additional Resources Section -->
                        <div class="mt-5 pt-4 border-top">
                            <h5 class="fw-bold mb-3" style="color: #2C3E50;">
                                <i class="bi bi-link-45deg me-2"></i>Additional Resources
                            </h5>
                            <div class="d-flex align-items-center">
                                <a href="#" class="btn btn-outline-primary me-3">
                                    <i class="bi bi-download me-2"></i>Download PDF
                                </a>
                                <a href="#" class="btn btn-outline-secondary">
                                    <i class="bi bi-share me-2"></i>Share
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .guideline-content {
        color: #2C3E50;
    }
    .description-content {
        text-align: justify;
    }
    .description-content p {
        margin-bottom: 1rem;
        line-height: 1.8;
    }
</style>
@endsection