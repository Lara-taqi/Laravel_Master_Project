@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="container my-5">
    <div class="d-flex align-items-center mb-4">
        <h1 class="title me-3 mb-0 fs-3 filter">Hotel Filter</h1>
        <div class="flex-grow-1 border-top border-2"></div>
    </div>

    @if($hotels->count() > 0)
        <div class="d-flex flex-wrap gap-4 justify-content-start">
            @foreach($hotels as $hotel)
                <div class="card shadow-sm border-0" style="width: 280px; border-radius: 10px; overflow: hidden;">
                    @if($hotel->image_path)
                        <div style="height:180px; overflow: hidden;">
                            <img 
                                src="{{ asset('storage/' . $hotel->image_path) }}" 
                                alt="{{ $hotel->hotel_name }}" 
                                class="w-100 h-100" 
                                style="object-fit: cover;"
                            >
                        </div>
                    @endif
                    <div class="card-body p-3" style="background-color: #fff;">
                        <h5 class="card-title fs-5 fw-semibold mb-2">{{ $hotel->hotel_name }}</h5>
                        <p class="text-muted fs-6 mb-1">{{ $hotel->hotel_location }}</p>
                        <p class="mb-2">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="bi {{ $i <= $hotel->hotel_rating ? 'bi-star-fill text-warning' : 'bi-star' }}"></i>
                            @endfor
                        </p>
                        <p class="card-text fs-7 text-truncate" style="max-height: 3.6em; overflow: hidden;">
                            {{ Str::limit($hotel->hotel_description ?? 'No description available.', 100) }}
                        </p>
                        <button 
                            type="button" 
                            class="btn btn-primary btn-sm mt-2"
                            data-bs-toggle="modal" 
                            data-bs-target="#hotelModal{{ $hotel->id }}"
                        >
                            View Details
                        </button>
                    </div>
                </div>

              
                <div class="modal fade" id="hotelModal{{ $hotel->id }}" tabindex="-1" aria-labelledby="hotelModalLabel{{ $hotel->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content rounded-3">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hotelModalLabel{{ $hotel->id }}">{{ $hotel->hotel_name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body card_filter">
                                @if($hotel->image_path)
                                    <img src="{{ asset('storage/' . $hotel->image_path) }}" alt="{{ $hotel->hotel_name }}" class="img-fluid rounded mb-3" style="height: 250px; object-fit: cover; width: 100%;">
                                @endif
                                <p><strong>Location:</strong> {{ $hotel->hotel_location }}</p>
                                <p><strong>Rating:</strong>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="bi {{ $i <= $hotel->hotel_rating ? 'bi-star-fill text-warning' : 'bi-star' }}"></i>
                                    @endfor
                                </p>
                                <p><strong>Description:</strong> {{ $hotel->hotel_description ?? 'No description available.' }}</p>
                                <p><strong>Price:</strong> ${{ $hotel->price_per_night ?? 'N/A' }} per night</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="fs-6 "style="font-size:30px;">No hotels found with {{ $stars ?? '' }} stars.</p>
    @endif
</div>
