@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')
<div class="container-fluid mt-4">
 <div class="row">
 @include('admin.sidebar')
        <div class="col-md-9 col-lg-10 main-content mx-auto p-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h2 class="text-center mb-4 fw-bold">Hotels List</h2>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center align-middle custom-table">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Hotel Name</th>
                                    <th>Location</th>
                                    <th>Description</th>
                                    <th>Rating</th>
                                    <th>Price per Night</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hotels as $index => $hotel)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $hotel->hotel_name }}</td>
                                    <td>{{ $hotel->hotel_location }}</td>
                                    <td>{{ Str::limit($hotel->hotel_description, 30) }}</td>
                                    <td>{{ $hotel->hotel_rating }}</td>
                                    <td>${{ number_format($hotel->price_per_night, 2) }}</td>
                                    <td>
                                        @if($hotel->image_path)
                                            <img src="{{ asset('storage/' . $hotel->image_path) }}" alt="Image" class="rounded" style="width: 70px; height: 45px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.hotels.edit', $hotel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this hotel?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
