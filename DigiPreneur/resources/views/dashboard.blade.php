@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="container-fluid py-5" style="background: linear-gradient(135deg, #0FBAB4, #00A69D); color: white;">
    <div class="container text-center">
        <h1 class="fw-bold display-4" style="font-size: 2.5rem;">Digitalize Your Business with DigiPreneur</h1>
        <p class="lead mt-3" style="font-size: 1.2rem;">Transform your business with innovative digital solutions. Scale up your business today!</p>
        <a href="{{ route('training_programs.index') }}" class="btn btn-light btn-lg me-3" style="font-size: 1rem; padding: 10px 30px;">Explore Trainings</a>
        <a href="#" class="btn btn-outline-light btn-lg" style="font-size: 1rem; padding: 10px 30px;">Learn More</a>
    </div>
</div>

<!-- Estimate Section -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10 bg-light shadow-sm p-4 rounded">
            <h4 class="text-center mb-4 fw-bold" style="color: #0FBAB4; font-size: 1.8rem;">Search for Training Programs</h4>
            <form action="{{ route('training_programs.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <input type="text" name="location" class="form-control" placeholder="Training Location" style="font-size: 1rem; padding: 10px;">
                    </div>
                    <div class="col-md-5 mb-3">
                        <input type="text" name="category" class="form-control" placeholder="Training Category" style="font-size: 1rem; padding: 10px;">
                    </div>
                    <div class="col-md-2 mb-3">
                        <button type="submit" class="btn btn-primary w-100" style="background-color: #FF6700; border: none; font-size: 1rem; padding: 10px;">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Who We Are Section -->
<div class="container my-5 text-center">
    <h2 class="fw-bold mb-4" style="color: #0FBAB4; font-size: 2rem;">Why Choose DigiPreneur?</h2>
    <div class="row">
        <div class="col-md-4">
            <i class="bi bi-globe fs-1" style="color: #FF6700; font-size: 2.5rem;"></i>
            <h5 class="mt-3" style="font-size: 1.5rem; font-weight: 500;">Wide Reach</h5>
            <p style="font-size: 1rem;">Access SME training from anywhere, anytime.</p>
        </div>
        <div class="col-md-4">
            <i class="bi bi-lightning fs-1" style="color: #FF6700; font-size: 2.5rem;"></i>
            <h5 class="mt-3" style="font-size: 1.5rem; font-weight: 500;">Fast and Secure</h5>
            <p style="font-size: 1rem;">Quick access to resources with a secure platform.</p>
        </div>
        <div class="col-md-4">
            <i class="bi bi-gear fs-1" style="color: #FF6700; font-size: 2.5rem;"></i>
            <h5 class="mt-3" style="font-size: 1.5rem; font-weight: 500;">Innovative Solutions</h5>
            <p style="font-size: 1rem;">Providing the latest digital solutions for SMEs.</p>
        </div>
    </div>
</div>

<!-- Upcoming Events Section -->
<div class="container my-5">
    <h4 class="fw-bold text-center mb-4" style="color: #0FBAB4; font-size: 1.8rem;">Upcoming Training Programs</h4>
    <div class="row">
        @forelse($upcomingEvents as $event)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ $event->image ? asset($event->image) : 'https://via.placeholder.com/400x200' }}" class="card-img-top" alt="{{ $event->title }}">
                    <div class="card-body">
                        <h5 class="card-title fw-bold" style="font-size: 1.3rem;">{{ $event->title }}</h5>
                        <p class="text-muted" style="font-size: 1rem;">
                            <i class="bi bi-calendar3"></i> {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}
                        </p>
                        <p class="text-muted" style="font-size: 1rem;">
                            <i class="bi bi-geo-alt"></i> {{ $event->location }}
                        </p>
                        <a href="{{ route('training_programs.show', $event->id) }}" class="btn btn-primary w-100" style="background-color: #FF6700; border: none; font-size: 1rem;">Details</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center" style="font-size: 1rem;">No upcoming training programs available.</p>
        @endforelse
    </div>
</div>

<!-- Call to Action Section -->
<div class="container-fluid py-5" style="background: linear-gradient(135deg, #0FBAB4, #00A69D); color: white;">
    <div class="container text-center">
        <h3 class="fw-bold" style="font-size: 2rem;">Ready to Digitalize Your Business?</h3>
        <p class="mt-3" style="font-size: 1.2rem;">Access our best training and digital solutions to grow your business.</p>
        <a href="{{ route('training_programs.index') }}" class="btn btn-light btn-lg" style="font-size: 1rem; padding: 10px 30px;">See All Trainings</a>
    </div>
</div>
@endsection
