@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Customer</h1>
    <form method="POST" action="{{ route('customer_service.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="message">Message</label>
            <textarea name="message" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
