
<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-4">
<div class="row">
<?php echo $__env->make('admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div class="col-md-9 col-lg-10 main-content mx-auto p-4">
            <div class="card shadow-sm border-0" style="max-width: 700px; margin: 0 auto;">
                <div class="card-body">
                    <h2 class="text-center mb-4 fw-bold">Edit Hotel</h2>

                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('admin.hotels.update', $hotel->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group mb-3">
                            <label class="fw-semibold">Hotel Name</label>
                            <input type="text" name="hotel_name" class="form-control" value="<?php echo e(old('hotel_name', $hotel->hotel_name)); ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-semibold">Location</label>
                            <input type="text" name="hotel_location" class="form-control" value="<?php echo e(old('hotel_location', $hotel->hotel_location)); ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-semibold">Description</label>
                            <textarea name="hotel_description" class="form-control" rows="3" required><?php echo e(old('hotel_description', $hotel->hotel_description)); ?></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-semibold">Rating</label>
                            <input type="number" name="hotel_rating" class="form-control" step="0.1" min="0" max="5" value="<?php echo e(old('hotel_rating', $hotel->hotel_rating)); ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-semibold">Price per Night ($)</label>
                            <input type="number" name="price_per_night" class="form-control" step="0.01" value="<?php echo e(old('price_per_night', $hotel->price_per_night)); ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-semibold">Current Image</label><br>
                            <?php if($hotel->image_path): ?>
                                <img src="<?php echo e(asset('storage/' . $hotel->image_path)); ?>" alt="Hotel Image" class="rounded shadow-sm" width="120" height="80" style="object-fit: cover;">
                            <?php else: ?>
                                <p class="text-muted">No image uploaded.</p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-semibold">Upload New Image (optional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="<?php echo e(route('admin.hotels.index')); ?>" class="btn btn-secondary px-4">Cancel</a>
                            <button type="submit" class="btn btn-success px-4">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views/admin/hotels/edit.blade.php ENDPATH**/ ?>