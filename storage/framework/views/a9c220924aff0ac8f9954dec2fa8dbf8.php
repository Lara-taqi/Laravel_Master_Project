<?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php if(session('success')): ?>
    <div class="mb-4 text-green-600 bg-green-100 border border-green-400 p-2 rounded">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<?php if($errors->any()): ?>
    <div class="mb-4 text-red-600 bg-red-100 border border-red-400 p-2 rounded">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<div class="flex min-h-screen bg-gray-100 dark:bg-gray-900">

   <?php echo $__env->make('admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="flex-1 flex justify-center items-start mt-10">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 w-full max-w-2xl">

            <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

            <form action="<?php echo e(route('admin.rooms.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
                <?php echo csrf_field(); ?>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Hotel ID</label>
                    <input type="number" name="hotel_id" id="name" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                </div>

            <?php
                $roomTypes = ['single', 'double', 'suite', 'deluxe'];
            ?>

                <div>
                    <label for="room_type" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Room Type</label>
                        <select name="room_type" id="room_type" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                            <option value="">Choose room type</option>
                                <?php $__currentLoopData = $roomTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type); ?>"><?php echo e(ucfirst($type)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                </div>

                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Room Capacity</label>
                    <input type="number" name="room_capacity" id="name" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Room Price</label>
                    <input type="number" name="room_price" id="name" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="is_available" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Room Availability</label>
                        <select name="is_available" id="is_available" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                </div>
                
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Room Description</label>
                    <textarea name="room_description" id="description" rows="4" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md">
                    Submit
                </button>
            </form>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views\admin\rooms\index.blade.php ENDPATH**/ ?>