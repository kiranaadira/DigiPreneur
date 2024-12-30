@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="fw-bold" style="color: #0FBAB4;">Account Settings</h2>
    <div class="card shadow-sm p-4" style="background-color: #f8f9fa;">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('settings.update') }}" method="POST">
            @csrf
            <!-- Nama -->
            <div class="mb-3">
                <label for="username" class="form-label fw-bold" style="color: #0FBAB4;">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="{{ $user->username }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label fw-bold" style="color: #0FBAB4;">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label fw-bold" style="color: #0FBAB4;">New Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Leave blank to keep current password">
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label fw-bold" style="color: #0FBAB4;">Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn w-100" style="background-color: #FF6700; color: white;">Save Changes</button>
        </form>
    </div>
</div>
@endsection
