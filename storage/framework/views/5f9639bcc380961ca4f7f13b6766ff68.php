<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

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
        <?php $__empty_1 = true; $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php if($hotel->id < 9): ?>
            <div class="card hotel-card mx-2" style="min-width: 200px;">
                <img src="<?php echo e(asset('storage/' . ($hotel->image_path ?? 'default.jpg'))); ?>" 
                     class="card-img-top" alt="<?php echo e($hotel->hotel_name); ?>">
                <div class="card-body p-2">
                    <h5 class="card-title mb-1"><?php echo e($hotel->hotel_name); ?></h5>
                    <p class="card-text small"><?php echo e(\Illuminate\Support\Str::limit($hotel->hotel_description, 50)); ?></p>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>لا توجد فنادق لعرضها حالياً.</p>
        <?php endif; ?>
    </div>
</div>


<?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views\layouts\Popularhotel.blade.php ENDPATH**/ ?>