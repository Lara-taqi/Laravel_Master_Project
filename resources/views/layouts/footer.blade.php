@vite(['resources/css/app.css', 'resources/js/app.js'])
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
<footer class="bg-dark text-light pt-5 pb-4 mt-5 footer-custom">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3 text-uppercase">Hotelak</h5>
                <p>
                    Discover the best hotels, exclusive offers, and luxury stays — all in one place.
                    Your comfort and experience are our top priorities.
                </p>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="text-light"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-linkedin fa-lg"></i></a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3 text-uppercase">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('welcome') }}" class="text-decoration-none text-secondary">Home</a></li>
                    <li><a href="#offers" class="text-decoration-none text-secondary">Best Offers</a></li>
                    <li><a href="#testimonial" class="text-decoration-none text-secondary">Testimonials</a></li>
                    <li><a href="#contact" class="text-decoration-none text-secondary">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3 text-uppercase">Contact Info</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt me-2"></i> Amman, Jordan</li>
                    <li><i class="fas fa-phone-alt me-2"></i> +962 79 123 4567</li>
                    <li><i class="fas fa-envelope me-2"></i> support@hotelak.com</li>
                </ul>
            </div>

        </div>

        <hr class="border-secondary">

        <div class="text-center">
            © {{ date('Y') }} <strong>Hotelak</strong>. All Rights Reserved.
        </div>
    </div>
</footer>
