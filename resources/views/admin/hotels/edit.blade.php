@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')
<div class="container-fluid mt-4">
<div class="row">
@include('admin.sidebar')
        <div class="col-md-9 col-lg-10 main-content mx-auto p-4">
            <div class="card shadow-sm border-0" style="max-width: 700px; margin: 0 auto;">
                <div class="card-body">
                    <h2 class="text-center mb-4 fw-bold">Edit Hotel</h2>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.hotels.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label class="fw-semibold">Hotel Name</label>
                            <input type="text" name="hotel_name" class="form-control" value="{{ old('hotel_name', $hotel->hotel_name) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-semibold">Location</label>
                            <input type="text" name="hotel_location" class="form-control" value="{{ old('hotel_location', $hotel->hotel_location) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-semibold">Description</label>
                            <textarea name="hotel_description" class="form-control" rows="3" required>{{ old('hotel_description', $hotel->hotel_description) }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-semibold">Rating</label>
                            <input type="number" name="hotel_rating" class="form-control" step="0.1" min="0" max="5" value="{{ old('hotel_rating', $hotel->hotel_rating) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-semibold">Price per Night ($)</label>
                            <input type="number" name="price_per_night" class="form-control" step="0.01" value="{{ old('price_per_night', $hotel->price_per_night) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-semibold">Current Image</label><br>
                            @if($hotel->image_path)
                                <img src="{{ asset('storage/' . $hotel->image_path) }}" alt="Hotel Image" class="rounded shadow-sm" width="120" height="80" style="object-fit: cover;">
                            @else
                                <p class="text-muted">No image uploaded.</p>
                            @endif
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-semibold">Upload New Image (optional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.hotels.index') }}" class="btn btn-secondary px-4">Cancel</a>
                            <button type="submit" class="btn btn-success px-4">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
