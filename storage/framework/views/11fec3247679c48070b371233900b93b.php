
<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-4">
    <div class="row">
        
            <?php echo $__env->make('admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
       
        <div class="col-md-9 col-lg-10 main-content mx-auto p-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h2 class="text-center mb-4 fw-bold">All Bookings</h2>

                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center align-middle custom-table">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Hotel</th>
                                    <th>Room</th>
                                    <th>Guest</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Booking Decision</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($booking->id); ?></td>
                                    <td><?php echo e($booking->user->name); ?></td>
                                    <td><?php echo e($booking->hotel->hotel_name); ?></td>
                                    <td><?php echo e($booking->room->room_type); ?></td>
                                    <td><?php echo e($booking->guest_name); ?></td>
                                    <td><?php echo e($booking->check_in); ?></td>
                                    <td><?php echo e($booking->check_out); ?></td>
                                    <td>$<?php echo e(number_format($booking->total_price, 2)); ?></td>
                                    <td>
                                        <span class="badge 
                                            <?php if($booking->status == 'Pending'): ?> bg-warning 
                                            <?php elseif($booking->status == 'Accepted'): ?> bg-success 
                                            <?php else: ?> bg-danger 
                                            <?php endif; ?>">
                                            <?php echo e($booking->status); ?>

                                        </span>
                                    </td>
                                    <td>
    <form action="<?php echo e(route('admin.bookings.updateStatus', $booking->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <select name="status" class="form-select" onchange="this.form.submit()">
            <option value="Pending" <?php if($booking->status == 'Pending'): ?> selected <?php endif; ?>>Pending</option>
            <option value="Accepted" <?php if($booking->status == 'Accepted'): ?> selected <?php endif; ?>>Accepted</option>
            <option value="Rejected" <?php if($booking->status == 'Rejected'): ?> selected <?php endif; ?>>Rejected</option>
        </select>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views/admin/bookings/index.blade.php ENDPATH**/ ?>