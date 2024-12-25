@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="fw-bold" style="color: #0FBAB4;">Add a Program</h2>
    <div class="card shadow-sm p-4" style="background-color: #f8f9fa;">
        <form action="{{ route('training_programs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Description</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Location</label>
                <select name="location" id="location" class="form-select" required onchange="toggleVenueInput()">
                    <option value="" disabled selected>Choose Location</option>
                    <option value="Online">Online</option>
                    <option value="Offline">Offline</option>
                </select>
            </div>
            <div class="mb-3" id="venueInput" style="display: none;">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Venue</label>
                <input type="text" name="venue" id="venue" class="form-control">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold" style="color: #0FBAB4;">Starting Date</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold" style="color: #0FBAB4;">Completed Date</label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold" style="color: #0FBAB4;">Starting Time</label>
                    <input type="time" name="start_time" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold" style="color: #0FBAB4;">End Time</label>
                    <input type="time" name="end_time" class="form-control" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Price</label>
                <input type="number" name="price" class="form-control" required>
                <small class="form-text text-muted">Enter 0 if it's free of charge</small>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #0FBAB4;">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('training_programs.index') }}" class="btn btn-outline-secondary">Back</a>
                <button type="submit" class="btn" style="background-color: #FF6700; color: white;">Save</button>
            </div>
        </form>
    </div>
</div>
<script>
    function toggleVenueInput() {
        const locationSelect = document.getElementById('location');
        const venueInput = document.getElementById('venueInput');
        const venueField = document.getElementById('venue');
        venueInput.style.display = locationSelect.value === 'Offline' ? 'block' : 'none';
        venueField.required = locationSelect.value === 'Offline';
    }
</script>
@endsection
