 <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
         <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

 <div class="w-64 bg-white  shadow-md p-4 side">
    
        <h4 class="text-lg font-semibold mb-4 text-gray-700 dark:text-gray-900"> Admin Dashboard</h4>
        <ul class="space-y-2">
            <li>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center gap-2 text-gray-900 dark:text-gray-900 hover:text-blue-500 ">
                    <i class="bi bi-house"></i> Hotel
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('admin.rooms.index')); ?>" class="flex items-center gap-2 text-gray-900 dark:text-gray-900 hover:text-blue-500">
                    <i class="bi bi-person-square"></i> Romms 
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('admin.hotelimgs.index')); ?>"  class="flex items-center gap-2 text-gray-900 dark:text-gray-900 hover:text-blue-500">
                    <i class="bi bi-building"></i> Hotel imges
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('admin.bookings.index')); ?>"  class="flex items-center gap-2 text-gray-900 dark:text-gray-900 hover:text-blue-500">
                    <i class="bi bi-building"></i> Booking info
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('admin.hotels.index')); ?>"  class="flex items-center gap-2 text-gray-900 dark:text-gray-900 hover:text-blue-500">
                    <i class="bi bi-building"></i> Hotel Info
                </a>
            </li>

        </ul>
    </div><?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views/admin/sidebar.blade.php ENDPATH**/ ?>