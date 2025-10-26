
<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

<?php $__env->startSection('content'); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<section>
    <div class="container py-5">
        <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row justify-content-center mb-4">
            <div class="col-md-12 col-xl-10">
                <div class="card shadow-0 border rounded-3">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                    <img src="<?php echo e(asset('storage/' . ($hotel->image_path ?? 'default.jpg'))); ?>" 
                                         class="w-100" style="height: 160px; object-fit: cover;" alt="Hotel Image">
                                    <a href="#!">
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-xl-6">
                                <h5><?php echo e($hotel->hotel_name); ?></h5>

                                <div class="d-flex flex-row mb-2">
                                    <?php
                                        $rating = $hotel->hotel_rating ?? 0;
                                        $fullStars = floor($rating);
                                        $halfStar = ($rating - $fullStars) >= 0.5;
                                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                    ?>

                                    <?php for($i = 0; $i < $fullStars; $i++): ?>
                                        <i class="fa fa-star"></i>
                                    <?php endfor; ?>

                                    <?php if($halfStar): ?>
                                        <i class="fa fa-star-half-alt"></i>
                                    <?php endif; ?>

                                    <?php for($i = 0; $i < $emptyStars; $i++): ?>
                                        <i class="far fa-star"></i>
                                    <?php endfor; ?>
                                </div>

                                <p class="text-truncate mb-0"><?php echo e(Str($hotel->hotel_description, 200)); ?></p>
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

                                <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#galleryModal<?php echo e($hotel->id); ?>">
                                    View Photo
                                </button>
                                <button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#infoModal<?php echo e($hotel->id); ?>">
                                    More Info
                                </button>

                                <?php if($hotel->price): ?>
                                <div class="mt-3">
                                    <h6 class="text-success">From $<?php echo e($hotel->price); ?></h6>
                                </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>

<?php if(auth()->guard()->check()): ?>
<?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="bookingModal<?php echo e($hotel->id); ?>" tabindex="-1" aria-labelledby="bookingModalLabel<?php echo e($hotel->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel<?php echo e($hotel->id); ?>">
                    Book a Room at <?php echo e($hotel->hotel_name); ?>

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="<?php echo e(route('bookings.store')); ?>" method="POST" id="bookingForm<?php echo e($hotel->id); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="hotel_id" value="<?php echo e($hotel->id); ?>">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="guest_name" class="form-control" value="<?php echo e(Auth::user()->name); ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Check-in Date</label>
                            <input type="date" name="check_in" class="form-control start-date" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Check-out Date</label>
                            <input type="date" name="check_out" class="form-control end-date" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Room Type</label>
                            <select name="room_id" class="form-select room-type" required>
                                <option value="">Select Room Type</option>
                                <?php $__currentLoopData = $hotel->rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($room->is_available): ?>
                                        <option value="<?php echo e($room->id); ?>" data-price="<?php echo e($room->room_price); ?>">
                                            <?php echo e($room->room_type); ?> - $<?php echo e($room->room_price); ?>

                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Number of Guests</label>
                            <input type="number" name="guests" min="1" class="form-control guests-count" value="1" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Total Price ($)</label>
                            <input type="text" id="total<?php echo e($hotel->id); ?>" class="form-control total-price fw-bold text-success" readonly placeholder="Total Price">
                        </div>
                    </div>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-success btn-lg">Confirm Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="galleryModal<?php echo e($hotel->id); ?>" tabindex="-1" aria-labelledby="galleryModalLabel<?php echo e($hotel->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content rounded shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="galleryModalLabel<?php echo e($hotel->id); ?>">
                    <?php echo e($hotel->hotel_name); ?> - Photo Gallery
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <?php $__empty_1 = true; $__currentLoopData = $hotel->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-6 col-md-3">
                            <img src="<?php echo e(asset('storage/' . $image->image_path)); ?>" 
                                 class="img-fluid rounded shadow-sm" alt="Hotel Image"
                                 style="height: 180px; object-fit: cover; width: 100%;">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-muted">No Photos For This Hotel</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="infoModal<?php echo e($hotel->id); ?>" tabindex="-1" aria-labelledby="infoModalLabel<?php echo e($hotel->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel<?php echo e($hotel->id); ?>">
                    <?php echo e($hotel->hotel_name); ?> - Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <img src="<?php echo e(asset('storage/' . ($hotel->image_path ?? 'default.jpg'))); ?>"
                             class="img-fluid rounded shadow-sm"
                             alt="Hotel Image"
                             style="height: 250px; object-fit: cover; width: 100%;">
                    </div>

                    <div class="col-md-6">
                        <h5 class="fw-bold mb-2"><?php echo e($hotel->hotel_name); ?></h5>

                        
                        <div class="mb-2">
                            <?php for($i = 0; $i < floor($hotel->hotel_rating ?? 0); $i++): ?>
                                <i class="fa fa-star text-warning"></i>
                            <?php endfor; ?>
                            <span class="ms-2 text-muted">(<?php echo e($hotel->hotel_rating ?? 'N/A'); ?>)</span>
                        </div>

                        
                        <p class="text-muted mb-3" style="max-height: 100px; overflow-y: auto;">
                            <?php echo e($hotel->hotel_description ?? 'No description available.'); ?>

                        </p>

                      
                        <ul class="list-unstyled mb-3">
                            <li><i class="fa fa-wifi text-primary me-2"></i> Free Wi-Fi</li>
                            <li><i class="fa fa-utensils text-primary me-2"></i> Restaurant</li>
                            <li><i class="fa fa-swimmer text-primary me-2"></i> Swimming Pool</li>
                            <li><i class="fa fa-dumbbell text-primary me-2"></i> Fitness Center</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bookingModal<?php echo e($hotel->id); ?>">Book Now</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo $__env->make('layouts.testimonial', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views/layouts/booknow.blade.php ENDPATH**/ ?>