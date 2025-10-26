
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

<div class="flex min-h-screen bg-gray-100 ">

   <?php echo $__env->make('admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="flex-1 flex justify-center items-start mt-10">
        <div class="bg-white  shadow-lg rounded-lg p-6 w-full max-w-2xl">

            <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

            <form action="<?php echo e(route('admin.hotels.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
                <?php echo csrf_field(); ?>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Hotel Name</label>
                    <input type="text" name="hotel_name" id="name" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Hotel Location</label>
                    <input type="text" name="hotel_location" id="location" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Hotel description</label>
                    <textarea name="hotel_description" id="description" rows="4" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required></textarea>
                </div>

                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Hotel Rating</label>
                    <select name="hotel_rating" id="rating" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                        <option value="">choose rating</option>
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?> Star</option>
                        <?php endfor; ?>
                    </select>
                </div>
                
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Hotel Price</label>
                    <input type="number" name="price_per_night" id="name" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="is_available" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Hotel Availability</label>
                        <select name="is_active" id="is_available" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                            <option value="1">Active</option>
                            <option value="0">Not Active</option>
                        </select>
                </div>

                <div>
                    <label for="images" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Hotel Images</label>
                    <input type="file" name="image" id="images" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" multiple>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md">
                    Submit
                </button>
            </form>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views/admin/admindashboard.blade.php ENDPATH**/ ?>