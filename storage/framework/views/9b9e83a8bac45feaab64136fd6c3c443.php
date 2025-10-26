
<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<?php $__env->startSection('content'); ?>
<section style="background-color: #f8f9fa;">
  <div class="container py-5">
    <h1 class="text-center mb-5 fw-bold offertitle">Best Offers Here </h1>

    <div class="row g-4">
      <?php $__empty_1 = true; $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if($hotel->price_per_night > 55): ?> <!-- شرط السعر -->

        <div class="col-12 col-sm-6 col-lg-4">
          <div class="card border-0 shadow-sm h-100 hotel-card position-relative overflow-hidden ">

            <?php
                $minPrice = $hotel->price_per_night ?? 0;

                if ($minPrice > 100) {
                    $discountedPrice = $minPrice * 0.5; // خصم 50%
                    $discount = 50;
                } else {
                    $discountedPrice = $minPrice * 0.8; // خصم 20%
                    $discount = 20;
                }
            ?>

            <!-- صورة الفندق مع السعر والخصم -->
            <div class="hotel-image-wrapper position-relative">
                <img src="<?php echo e(asset('storage/' . ($hotel->image_path ?? 'default.jpg'))); ?>" 
                     class="card-img-top img-fluid" 
                     alt="<?php echo e($hotel->hotel_name); ?>"
                     style="height: 240px; object-fit: cover;">

                <span class="price-tag badge bg-primary position-absolute top-0 start-0 m-3 px-3 py-2">
                    <del>$<?php echo e(number_format($minPrice, 2)); ?></del> $<?php echo e(number_format($discountedPrice, 2)); ?>

                </span>

                <span class="badge bg-danger position-absolute top-0 end-0 m-3 px-2 py-1">
                    -<?php echo e($discount); ?>%
                </span>
            </div>

            <!-- محتوى الكارت -->
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h5 class="card-title text-dark fw-bold"><?php echo e($hotel->hotel_name); ?></h5>
                    <p class="card-text text-muted small mb-3">
                        <?php echo e(Str::limit($hotel->hotel_description, 80)); ?>

                    </p>

                    <!-- التقييم على شكل نجوم -->
                    <div class="mb-3">
                        <?php 
                            $rating = (int) ($hotel->hotel_rating ?? 4);
                        ?>
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <i class="bi <?php echo e($i <= $rating ? 'bi-star-fill text-warning' : 'bi-star text-muted'); ?>"></i>
                        <?php endfor; ?>
                    </div>
                </div>

                <!-- زر الحجز -->
                <div class="d-flex justify-content-center mt-auto">
                    <?php if(auth()->guard()->check()): ?>
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#bookingModal<?php echo e($hotel->id); ?>">
                            Book Now
                        </button>
                    <?php else: ?>
                        <button class="btn btn-success btn-sm" onclick="showLoginAlert()">
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views\layouts\hoteloffer.blade.php ENDPATH**/ ?>