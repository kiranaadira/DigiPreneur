@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Create Form -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header border-0 bg-gradient-primary text-white p-4" style="background: linear-gradient(45deg, #0FBAB4, #2C3E50);">
                    <h3 class="mb-0">Create New Guideline</h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('guideline.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label h6" style="color: #0FBAB4;">Title</label>
                            <input type="text" name="title" class="form-control form-control-lg @error('title') is-invalid @enderror">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label h6" style="color: #0FBAB4;">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="6"></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label h6" style="color: #0FBAB4;">Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="Active">Active</option>
                                    <option value="Draft">Draft</option>
                                    <option value="Archived">Archived</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label h6" style="color: #0FBAB4;">Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('guideline.index') }}" class="btn btn-light px-4">Cancel</a>
                            <button type="submit" class="btn btn-lg px-5" style="background-color: #FF6700; color: white;">
                                Save Guideline
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection