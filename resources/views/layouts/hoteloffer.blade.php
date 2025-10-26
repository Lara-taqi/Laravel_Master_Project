@extends('layouts.app')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')
<section style="background-color: #f8f9fa;">
  <div class="container py-5">
    <h1 class="text-center mb-5 fw-bold offer-title-custom">Best Offers Here</h1>

    <div class="row g-4">
      @forelse($hotels as $hotel)
        @if($hotel->price_per_night > 55)

        <div class="col-12 col-sm-6 col-lg-4">
          <div class="card offer-card-custom shadow-lg h-100 position-relative overflow-hidden border-0">

            @php
                $minPrice = $hotel->price_per_night ?? 0;
                if ($minPrice > 100) {
                    $discountedPrice = $minPrice * 0.5;
                    $discount = 50;
                } else {
                    $discountedPrice = $minPrice * 0.8;
                    $discount = 20;
                }
            @endphp
            <div class="offer-image-wrapper position-relative">
                <img src="{{ asset('storage/' . ($hotel->image_path ?? 'default.jpg')) }}" 
                     class="img-fluid offer-img-custom" 
                     alt="{{ $hotel->hotel_name }}">

                <span class="offer-price-tag badge bg-primary position-absolute top-0 start-0 m-3 px-3 py-2">
                    <del>${{ number_format($minPrice, 2) }}</del> ${{ number_format($discountedPrice, 2) }}
                </span>

                <span class="offer-discount badge bg-danger position-absolute top-0 end-0 m-3 px-2 py-1">
                    -{{ $discount }}%
                </span>
            </div>

            <div class="card-body d-flex flex-column justify-content-between offer-body-custom">
                <div>
                    <h5 class="offer-title fw-bold text-dark">{{ $hotel->hotel_name }}</h5>
                    <p class="offer-description text-muted small mb-3">
                        {{ Str::limit($hotel->hotel_description, 80) }}
                    </p>
                    <div class="offer-rating mb-3">
                        @php 
                            $rating = (int) ($hotel->hotel_rating ?? 4);
                        @endphp
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi {{ $i <= $rating ? 'bi-star-fill text-warning' : 'bi-star text-muted' }}"></i>
                        @endfor
                    </div>
                </div>
                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start d-flex flex-column justify-content-center gap-2">
                                @auth
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bookingModal{{ $hotel->id }}">
                                        Book Now
                                    </button>
                                @else
                                    <button class="btn btn-primary btn-sm" onclick="showLoginAlert()">
                                        Book Now
                                    </button>
                                @endauth
                </div>
            </div>

          </div>
        </div>
        @endif
      @empty
        <div class="text-center text-muted py-5">
          <i class="bi bi-house-x fs-1 mb-3 d-block"></i>
          <p>No hotels available right now.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>




@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function showLoginAlert() {
    Swal.fire({
        icon: 'warning',
        title: 'Login Required',
        text: 'Please log in to book a room.',
        confirmButtonText: 'Go to Login',
        confirmButtonColor: '#3085d6',
    }).then(result => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('login') }}";
        }
    });
}
</script>
