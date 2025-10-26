@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        
            @include('admin.sidebar')
       
        <div class="col-md-9 col-lg-10 main-content mx-auto p-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h2 class="text-center mb-4 fw-bold">All Bookings</h2>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center align-middle custom-table">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Hotel</th>
                                    <th>Room</th>
                                    <th>Guest</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Booking Decision</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->hotel->hotel_name }}</td>
                                    <td>{{ $booking->room->room_type }}</td>
                                    <td>{{ $booking->guest_name }}</td>
                                    <td>{{ $booking->check_in }}</td>
                                    <td>{{ $booking->check_out }}</td>
                                    <td>${{ number_format($booking->total_price, 2) }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($booking->status == 'Pending') bg-warning 
                                            @elseif($booking->status == 'Accepted') bg-success 
                                            @else bg-danger 
                                            @endif">
                                            {{ $booking->status }}
                                        </span>
                                    </td>
                                    <td>
    <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <select name="status" class="form-select" onchange="this.form.submit()">
            <option value="Pending" @if($booking->status == 'Pending') selected @endif>Pending</option>
            <option value="Accepted" @if($booking->status == 'Accepted') selected @endif>Accepted</option>
            <option value="Rejected" @if($booking->status == 'Rejected') selected @endif>Rejected</option>
        </select>
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
