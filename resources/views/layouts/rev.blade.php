@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="container my-5">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <div class="d-flex align-items-center mb-4">
        <h1 class="title me-3 mb-0">Guest Review</h1>
        <div class="flex-grow-1 border-top border-2"></div>
    </div>

    <div class="row g-4">
        @forelse($reviews as $review)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm border-0 h-100 review-card">
                    <div class="card-body">
                        <h5 class="card-title text-dark mb-1">
                            <i class="bi bi-person-circle me-1 text-primary"></i> 
                            {{ $review->Name }}
                        </h5>
                        <h6 class="text-black mb-2">
                            <i class="bi bi-building text-secondary me-1"></i>
                            {{ $review->hotel->hotel_name }}
                        </h6>

                        <div class="mb-2">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $review->rating)
                                    <i class="bi bi-star-fill text-warning"></i>
                                @else
                                    <i class="bi bi-star text-muted"></i>
                                @endif
                            @endfor
                        </div>
                        <p class="card-text text-secondary">
                            "{{ $review->comment }}"
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted py-5">
                <i class="bi bi-chat-left-text fs-1 d-block mb-3"></i>
                No reviews yet.
            </div>
        @endforelse
    </div>
</div>
