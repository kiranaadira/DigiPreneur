@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Jadwal Pelatihan</h2>
    <form action="{{ route('training_programs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Judul -->
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <!-- Lokasi -->
        <div class="mb-3">
            <label class="form-label fw-bold">Lokasi</label>
            <select name="location" id="location" class="form-select" required onchange="toggleVenueInput()">
                <option value="" disabled selected>Pilih Lokasi</option>
                <option value="Online">Online</option>
                <option value="Offline">Offline</option>
            </select>
        </div>

        <!-- Tempat Acara (Kondisional untuk Offline) -->
        <div class="mb-3" id="venueInput" style="display: {{ old('location') == 'Offline' || (isset($training_program) && $training_program->location == 'Offline') ? 'block' : 'none' }};">
            <label class="form-label fw-bold">Tempat Acara</label>
            <input type="text" name="venue" id="venue" class="form-control" 
                value="{{ old('venue') ?? (isset($training_program) ? $training_program->venue : '') }}">
        </div>

        <!-- Tanggal Mulai dan Selesai -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Tanggal Mulai</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Tanggal Selesai</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
        </div>
        
        <!-- Waktu Mulai dan Selesai -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Waktu Mulai</label>
                <input type="time" name="start_time" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Waktu Selesai</label>
                <input type="time" name="end_time" class="form-control" required>
            </div>
        </div>

        <!-- Harga -->
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" required>
            <small class="form-text text-muted">Masukkan 0 jika gratis</small>
        </div>

        <!-- Gambar -->
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<!-- Script untuk Kolom Tempat Acara -->
<script>
    function toggleVenueInput() {
        const locationSelect = document.getElementById('location');
        const venueInput = document.getElementById('venueInput');
        const venueField = document.getElementById('venue');

        if (locationSelect.value === 'Offline') {
            venueInput.style.display = 'block';
            venueField.required = true; // Wajib diisi
        } else {
            venueInput.style.display = 'none';
            venueField.required = false; // Tidak wajib
            venueField.value = ''; // Kosongkan nilai input
        }
    }
</script>
@endsection
