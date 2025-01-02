@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Customer</h1>

    <form method="POST" action="{{ route('customer_service.update', $customer->id) }}">
        @csrf
        @method('PUT') <!-- Gunakan PUT untuk update -->

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $customer->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $customer->email }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ $customer->phone }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" class="form-control" required>{{ $customer->message }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
