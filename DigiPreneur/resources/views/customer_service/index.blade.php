@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Customer Service</h1>
    <a href="{{ route('customer_service.create') }}" class="btn btn-primary mb-3">Add New Customer</a>

    <form method="GET" action="{{ route('customer_service.index') }}" class="mb-3">
        <input type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}" class="form-control mb-2">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th><a href="?sort=name&order={{ request('order') === 'asc' ? 'desc' : 'asc' }}">Name</a></th>
                <th><a href="?sort=email&order={{ request('order') === 'asc' ? 'desc' : 'asc' }}">Email</a></th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>
                    <a href="{{ route('customer_service.edit', $customer) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('customer_service.destroy', $customer) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $customers->links() }}
</div>
@endsection
