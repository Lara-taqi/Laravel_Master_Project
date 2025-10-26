
<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-4">
 <div class="row">
 <?php echo $__env->make('admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div class="col-md-9 col-lg-10 main-content mx-auto p-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h2 class="text-center mb-4 fw-bold">Hotels List</h2>

                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center align-middle custom-table">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Hotel Name</th>
                                    <th>Location</th>
                                    <th>Description</th>
                                    <th>Rating</th>
                                    <th>Price per Night</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($hotel->hotel_name); ?></td>
                                    <td><?php echo e($hotel->hotel_location); ?></td>
                                    <td><?php echo e(Str::limit($hotel->hotel_description, 30)); ?></td>
                                    <td><?php echo e($hotel->hotel_rating); ?></td>
                                    <td>$<?php echo e(number_format($hotel->price_per_night, 2)); ?></td>
                                    <td>
                                        <?php if($hotel->image_path): ?>
                                            <img src="<?php echo e(asset('storage/' . $hotel->image_path)); ?>" alt="Image" class="rounded" style="width: 70px; height: 45px; object-fit: cover;">
                                        <?php else: ?>
                                            <span class="text-muted">N/A</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.hotels.edit', $hotel->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="<?php echo e(route('admin.hotels.destroy', $hotel->id)); ?>" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete this hotel?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views/admin/hotels/index.blade.php ENDPATH**/ ?>