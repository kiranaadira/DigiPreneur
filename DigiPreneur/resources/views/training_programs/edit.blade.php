@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="fw-bold" style="color: #0FBAB4;">Edit Training Program</h2>
    <div class="card shadow-sm p-4" style="background-color: #f8f9fa;">
        <form action="{{ route('training_programs.update', $training_program->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $training_program->title }}" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Description</label>
                <textarea name="description" class="form-control" rows="4" required>{{ $training_program->description }}</textarea>
            </div>

            <!-- Lokasi -->
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Location</label>
                <select name="location" id="location" class="form-select" required onchange="toggleVenueInput()">
                    <option value="Online" {{ $training_program->location == 'Online' ? 'selected' : '' }}>Online</option>
                    <option value="Offline" {{ $training_program->location == 'Offline' ? 'selected' : '' }}>Offline</option>
                </select>
            </div>

            <!-- Tempat Acara -->
            <div class="mb-3" id="venueInput" style="display: {{ $training_program->location == 'Offline' ? 'block' : 'none' }};">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Venue</label>
                <input type="text" name="venue" id="venue" class="form-control" value="{{ $training_program->venue }}">
            </div>

            <!-- Tanggal dan Waktu -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold" style="color: #0FBAB4;">Starting Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{ $training_program->start_date }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold" style="color: #0FBAB4;">Completed Date</label>
                    <input type="date" name="end_date" class="form-control" value="{{ $training_program->end_date }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold" style="color: #0FBAB4;">Starting Time</label>
                    <input type="time" name="start_time" class="form-control" value="{{ $training_program->start_time }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold" style="color: #0FBAB4;">End Time</label>
                    <input type="time" name="end_time" class="form-control" value="{{ $training_program->end_time }}" required>
                </div>
            </div>

            <!-- Harga -->
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Price</label>
                <input type="number" name="price" class="form-control" value="{{ $training_program->price }}" required>
            </div>

            <!-- Gambar -->
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Image</label>
                <input type="file" name="image" class="form-control">
                @if($training_program->image)
                    <img src="{{ asset('storage/' . $training_program->image) }}" class="mt-3 rounded" style="width: 150px;">
                @endif
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('training_programs.index') }}" class="btn btn-outline-secondary">Back</a>
                <button type="submit" class="btn" style="background-color: #FF6700; color: white;">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleVenueInput() {
        const locationSelect = document.getElementById('location');
        const venueInput = document.getElementById('venueInput');
        venueInput.style.display = locationSelect.value === 'Offline' ? 'block' : 'none';
    }
</script>
@endsection
