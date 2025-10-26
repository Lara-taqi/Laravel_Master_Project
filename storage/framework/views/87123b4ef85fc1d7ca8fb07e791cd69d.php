 <div class="w-64 bg-white dark:bg-gray-800 shadow-md p-4">
        <h4 class="text-lg font-semibold mb-4 text-gray-700 dark:text-gray-200">Dashboard</h4>
        <ul class="space-y-2">
            <li>
                <a href="<?php echo e(url('admin/admindashboard')); ?>" class="flex items-center gap-2 text-gray-600 dark:text-gray-300 hover:text-blue-500">
                    <i class="bi bi-house"></i> Hotel
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('admin.rooms.index')); ?>" class="flex items-center gap-2 text-gray-600 dark:text-gray-300 hover:text-blue-500">
                    <i class="bi bi-person-square"></i> Romms 
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('admin.hotelimgs.index')); ?>"  class="flex items-center gap-2 text-gray-600 dark:text-gray-300 hover:text-blue-500">
                    <i class="bi bi-building"></i> Hotel imges
                </a>
            </li>
            <li>
                <a href="logout.php" class="flex items-center gap-2 text-gray-600 dark:text-gray-300 hover:text-red-500">
                    <i class="bi bi-lock"></i> Logout
                </a>
            </li>
        </ul>
    </div><?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views\admin\sidebar.blade.php ENDPATH**/ ?>