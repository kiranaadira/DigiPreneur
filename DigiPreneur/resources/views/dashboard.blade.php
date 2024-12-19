@extends('layouts.app')

@section('content')
<!-- Header Promosi dan Pencarian -->
<div class="container-fluid mb-4 p-4" style="background: linear-gradient(135deg, #0FBAB4, #00A69D); border-radius: 10px;">
    <div class="row align-items-center">
        <!-- Teks Promosi -->
        <div class="col-md-6 text-white">
            <h1 class="fw-bold mb-3" style="font-size: 2rem;">
                Selamat Datang di DigiPreneur <br>
            </h1>
            <p class="mb-4" style="font-size: 1.1rem;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas maximus suscipit fermentum. Duis vitae pretium lectus.
            </p>
        </div>

        <!-- Kolom Pencarian -->
        <div class="col-md-6 d-flex justify-content-end">
            <form action="{{ route('training_programs.index') }}" method="GET" class="w-100" style="max-width: 400px;">
                <div class="input-group">
                    <input type="text" name="search" class="form-control rounded-start" placeholder="Mau nyari apa hari ini?" aria-label="Search">
                    <button class="btn btn-light rounded-end" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jadwal Pelatihan -->
<div class="container mt-4">
    <h4 class="fw-bold mb-3">Jadwal Pelatihan Terbaru</h4>
    <div class="row">
        @forelse($trainingPrograms as $program)
            <!-- Card Program Pelatihan -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    @if($program->image)
                        <img src="{{ asset('storage/' . $program->image) }}" class="card-img-top" alt="Program Image" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Placeholder Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $program->title }}</h5>
                        <p class="card-text mb-1">{{ $program->description }}</p>
                        <p class="text-muted">
                            <i class="bi bi-calendar-event me-1"></i> {{ \Carbon\Carbon::parse($program->start_date)->format('d M Y') }} - 
                            {{ \Carbon\Carbon::parse($program->end_date)->format('d M Y') }}
                        </p>
                        <p class="text-muted">
                            <i class="bi bi-geo-alt me-1"></i> {{ $program->location }}
                        </p>
                        <p class="fw-bold {{ $program->price == 0 ? 'text-success' : 'text-danger' }}">
                            {{ $program->price == 0 ? 'Gratis' : 'Rp' . number_format($program->price, 0, ',', '.') }}
                        </p>
                        <a href="#" class="btn btn-primary btn-sm">Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Tidak ada jadwal pelatihan tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
