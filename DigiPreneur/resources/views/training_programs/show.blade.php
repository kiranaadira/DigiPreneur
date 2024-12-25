@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-light rounded p-3">
            <li class="breadcrumb-item"><a href="/training_programs" class="text-primary">Training Programs</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $program->title }}</li>
        </ol>
    </nav>

    <!-- Tombol Back -->
    <div class="mb-4">
        <a href="{{ route('training_programs.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <!-- Detail Program -->
    <div class="row">
        <!-- Gambar -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('storage/' . $program->image) }}" class="card-img-top rounded" alt="{{ $program->title }}">
            </div>
        </div>

        <!-- Informasi Detail -->
        <div class="col-md-6">
            <h2 class="fw-bold text-primary">{{ $program->title }}</h2>
            <p class="text-muted mb-3">{{ Str::limit($program->description, 150) }}</p>

            <!-- Tanggal dan Waktu -->
            <div class="mb-3">
                <p class="mb-1">
                    <i class="bi bi-calendar-event text-primary me-2"></i>
                    <strong>Starting Date:</strong> {{ \Carbon\Carbon::parse($program->start_date)->format('d M Y') }}
                </p>
                <p class="mb-1">
                    <i class="bi bi-calendar-event text-primary me-2"></i>
                    <strong>Completed Date:</strong> {{ \Carbon\Carbon::parse($program->end_date)->format('d M Y') }}
                </p>
                <p class="mb-1">
                    <i class="bi bi-clock text-primary me-2"></i>
                    <strong>Starting Time:</strong> {{ \Carbon\Carbon::parse($program->start_time)->format('H:i') }}
                </p>
                <p>
                    <i class="bi bi-clock text-primary me-2"></i>
                    <strong>End Time:</strong> {{ \Carbon\Carbon::parse($program->end_time)->format('H:i') }}
                </p>
            </div>

            <!-- Lokasi -->
            <div class="mb-3">
                <p class="mb-1">
                    <i class="bi bi-geo-alt text-primary me-2"></i>
                    <strong>Location:</strong> {{ $program->location }}
                </p>
                @if($program->location == 'Offline' && $program->venue)
                    <p>
                        <i class="bi bi-building text-primary me-2"></i>
                        <strong>Venue:</strong> {{ $program->venue }}
                    </p>
                @endif
            </div>

            <!-- Status -->
            <div class="mb-3">
                <p>
                    <i class="bi bi-info-circle text-primary me-2"></i>
                    <strong>Status:</strong> {{ ucfirst($program->status) }}
                </p>
            </div>

            <!-- Harga -->
            <div class="mb-3">
                <p class="text-success fw-bold">
                    <i class="bi bi-cash-coin text-primary me-2"></i>
                    {{ $program->price == 0 ? 'Gratis' : 'Rp' . number_format($program->price, 0, ',', '.') }}
                </p>
            </div>

            <!-- Tombol -->
            <div>
                <a href="{{ route('training_programs.edit', $program->id) }}" class="btn btn-warning me-2">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <form action="{{ route('training_programs.destroy', $program->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this program?');">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Deskripsi -->
    <div class="mt-5">
        <h4 class="fw-bold text-primary">Description</h4>
        <p class="text-muted">{{ $program->description }}</p>
    </div>
</div>
@endsection
