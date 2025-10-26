

<?php $__env->startSection('content'); ?>

<div class="container hotels">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <div class="row gy-4">
    <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-12 card_hover">
        <div class="card shadow-sm rounded d-flex flex-row align-items-center p-3">

          <!-- صورة الفندق -->
          <div class="col-md-3 flex-shrink-0">
            <img src="<?php echo e(asset('storage/' . ($hotel->image_path ?? 'default.jpg'))); ?>" 
                 class="img-fluid rounded" alt="Hotel Image"
                 style="height: 160px; object-fit: cover; width: 100%;">
          </div>

          <!-- بيانات الفندق -->
          <div class="col-md-6 ps-4">
            <h5 class="card-title mb-2"><?php echo e($hotel->hotel_name); ?></h5>
            <p class="card-text text-muted"><?php echo e(Str::limit($hotel->hotel_description, 150)); ?></p>
          </div>

          <!-- أزرار الحجز والصور -->
          <div class="col-md-3 text-end d-flex flex-column justify-content-center gap-2">

            <?php if(auth()->guard()->check()): ?>
              <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#bookingModal<?php echo e($hotel->id); ?>">
                Book Now
              </button>
            <?php else: ?>
              <button class="btn btn-primary btn-lg" onclick="showLoginAlert()">
                Book Now
              </button>
            <?php endif; ?>

            <button class="btn btn-outline-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#galleryModal<?php echo e($hotel->id); ?>">
              View Photo
            </button>
          </div>

        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>



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
                <input type="number" name="guests" min="1" class="form-control guests-count" required>
              </div>

              <div class="col-md-12">
                <label class="form-label">Total Price ($)</label>
                <input type="text" id="total<?php echo e($hotel->id); ?>" class="form-control total-price" readonly>
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


<?php echo $__env->make('layouts.testimonial', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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

<script>
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('form[id^="bookingForm"]').forEach(form => {
    const startDateInput = form.querySelector('.start-date');
    const endDateInput = form.querySelector('.end-date');
    const roomTypeSelect = form.querySelector('.room-type');
    const guestsInput = form.querySelector('.guests-count');
    const totalInput = form.querySelector('.total-price');

    function calculateTotal() {
      const startDate = new Date(startDateInput.value);
      const endDate = new Date(endDateInput.value);
      const guests = parseInt(guestsInput.value) || 1;
      const roomPrice = parseFloat(roomTypeSelect.options[roomTypeSelect.selectedIndex]?.dataset.price || 0);
      const nights = (endDate - startDate) / (1000 * 60 * 60 * 24);

      if (nights > 0 && roomPrice > 0) {
        const total = nights * roomPrice * guests;
        totalInput.value = total.toFixed(2);
      } else {
        totalInput.value = '';
      }
    }

    [startDateInput, endDateInput, roomTypeSelect, guestsInput].forEach(el => {
      el.addEventListener('change', calculateTotal);
    });
  });
});
</script>
<?php $__env->stopPush(); ?>

<style>
.modal-open {
  overflow: hidden !important;
  padding-right: 0 !important;
}
.modal.fade .modal-dialog {
  transition: transform 0.2s ease-out;
  transform: translateY(-10%);
}
.modal.show .modal-dialog {
  transform: translateY(0);
}
</style>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views\layouts\booknow.blade.php ENDPATH**/ ?>