
<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<?php $__env->startSection('content'); ?>
<section style="background-color: #f8f9fa;">
  <div class="container py-5">
    <h1 class="text-center mb-5 fw-bold offer-title-custom">Best Offers Here</h1>

    <div class="row g-4">
      <?php $__empty_1 = true; $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if($hotel->price_per_night > 55): ?>

        <div class="col-12 col-sm-6 col-lg-4">
          <div class="card offer-card-custom shadow-lg h-100 position-relative overflow-hidden border-0">

            <?php
                $minPrice = $hotel->price_per_night ?? 0;
                if ($minPrice > 100) {
                    $discountedPrice = $minPrice * 0.5;
                    $discount = 50;
                } else {
                    $discountedPrice = $minPrice * 0.8;
                    $discount = 20;
                }
            ?>
            <div class="offer-image-wrapper position-relative">
                <img src="<?php echo e(asset('storage/' . ($hotel->image_path ?? 'default.jpg'))); ?>" 
                     class="img-fluid offer-img-custom" 
                     alt="<?php echo e($hotel->hotel_name); ?>">

                <span class="offer-price-tag badge bg-primary position-absolute top-0 start-0 m-3 px-3 py-2">
                    <del>$<?php echo e(number_format($minPrice, 2)); ?></del> $<?php echo e(number_format($discountedPrice, 2)); ?>

                </span>

                <span class="offer-discount badge bg-danger position-absolute top-0 end-0 m-3 px-2 py-1">
                    -<?php echo e($discount); ?>%
                </span>
            </div>

            <div class="card-body d-flex flex-column justify-content-between offer-body-custom">
                <div>
                    <h5 class="offer-title fw-bold text-dark"><?php echo e($hotel->hotel_name); ?></h5>
                    <p class="offer-description text-muted small mb-3">
                        <?php echo e(Str::limit($hotel->hotel_description, 80)); ?>

                    </p>
                    <div class="offer-rating mb-3">
                        <?php 
                            $rating = (int) ($hotel->hotel_rating ?? 4);
                        ?>
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <i class="bi <?php echo e($i <= $rating ? 'bi-star-fill text-warning' : 'bi-star text-muted'); ?>"></i>
                        <?php endfor; ?>
                    </div>
                </div>
                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start d-flex flex-column justify-content-center gap-2">
                                <?php if(auth()->guard()->check()): ?>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bookingModal<?php echo e($hotel->id); ?>">
                                        Book Now
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-primary btn-sm" onclick="showLoginAlert()">
                                        Book Now
                                    </button>
                                <?php endif; ?>
                </div>
            </div>

          </div>
        </div>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-center text-muted py-5">
          <i class="bi bi-house-x fs-1 mb-3 d-block"></i>
          <p>No hotels available right now.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>




<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
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
            window.location.href = "<?php echo e(route('login')); ?>";
        }
    });
}
</script>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views/layouts/hoteloffer.blade.php ENDPATH**/ ?>