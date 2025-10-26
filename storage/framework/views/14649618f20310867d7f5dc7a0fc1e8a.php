<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<?php echo $__env->make('layouts.booknow', ['hotels' => \App\Models\Hotel::with('rooms', 'images')->get()], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views/layouts/userview.blade.php ENDPATH**/ ?>