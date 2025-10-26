@vite(['resources/css/app.css', 'resources/js/app.js'])
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<div class="container my-5 position-relative">
    <div class="d-flex align-items-center mb-4">
        <h1 class="title me-3 mb-0">Popular Hotels in Jordan</h1>
        <div class="flex-grow-1 border-top border-2"></div>
    </div>

    <button class="scroll-btn left">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="scroll-btn right">
        <i class="fas fa-chevron-right"></i>
    </button>

    <div class="horizontal-scroll d-flex overflow-auto" id="cardContainer">
        @forelse ($hotels as $hotel)
            @if($hotel->id < 9)
            <div class="card hotel-card mx-2" style="min-width: 200px;">
                <img src="{{ asset('storage/' . ($hotel->image_path ?? 'default.jpg')) }}" 
                     class="card-img-top" alt="{{ $hotel->hotel_name }}">
                <div class="card-body p-2">
                    <h5 class="card-title mb-1">{{ $hotel->hotel_name }}</h5>
                    <p class="card-text large">{{ Str::limit($hotel->hotel_description, 75) }}</p>
                </div>
            </div>
            @endif
        @empty
            <p> Nothing to Display</p>
        @endforelse
    </div>
</div>


