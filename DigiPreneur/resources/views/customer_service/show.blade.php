@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-light rounded p-3">
            <li class="breadcrumb-item"><a href="{{ route('customer_service.index') }}" class="text-primary">Customer Service</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $customer->name }}</li>
        </ol>
    </nav>

    <!-- Tombol Back -->
    <div class="mb-4">
        <a href="{{ route('customer_service.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <!-- Detail Customer -->
    <div class="row">
        <!-- Informasi Detail -->
        <div class="col-md-12">
            <h2 class="fw-bold text-primary">{{ $customer->name }}</h2>
            <p class="text-muted mb-3"><strong>Email:</strong> {{ $customer->email }}</p>

            <!-- Nomor Telepon -->
            <div class="mb-3">
                <p class="mb-1">
                    <i class="fw-bold text-primary"></i>
                    <strong>Phone:</strong> {{ $customer->phone }}
                </p>
            </div>

            <!-- Pesan -->
            <div class="mb-3">
                <h5 class="fw-bold text-primary">Message:</h5>
                <p class="text-muted">{{ $customer->message }}</p>
            </div>

            <!-- Tombol -->
            <div>
                <a href="{{ route('customer_service.edit', $customer->id) }}" class="btn btn-warning me-2">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <form action="{{ route('customer_service.destroy', $customer->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this customer?');">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                <a href="{{ route('customer_service.pdf', $customer->id) }}" class="btn btn-outline-primary btn-sm px-3">
                    <i class="bi bi-file-earmark-pdf"></i> Download PDF
                </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
