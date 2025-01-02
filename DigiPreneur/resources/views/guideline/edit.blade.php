@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header border-0 bg-gradient-primary text-white p-4" style="background: linear-gradient(45deg, #0FBAB4, #2C3E50);">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Edit Guideline</h3>
                        <span class="badge bg-light text-dark">ID: #{{ $guideline->id }}</span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('guideline.update', $guideline->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label h6" style="color: #0FBAB4;">Title</label>
                            <input type="text" name="title" class="form-control form-control-lg" value="{{ $guideline->title }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label h6" style="color: #0FBAB4;">Description</label>
                            <textarea name="description" class="form-control" rows="6">{{ $guideline->description }}</textarea>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label h6" style="color: #0FBAB4;">Status</label>
                                <select name="status" class="form-select">
                                    @foreach(['Active', 'Draft', 'Archived'] as $status)
                                        <option value="{{ $status }}" {{ $guideline->status == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label h6" style="color: #0FBAB4;">Image</label>
                                <input type="file" name="image" class="form-control mb-2">
                                @if($guideline->image)
                                    <img src="{{ asset($guideline->image) }}" class="img-thumbnail" style="height: 100px;">
                                @endif
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('guideline.show', $guideline->id) }}" class="btn btn-light px-4">Cancel</a>
                            <button type="submit" class="btn btn-lg px-5" style="background-color: #FF6700; color: white;">
                                Update Guideline
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection