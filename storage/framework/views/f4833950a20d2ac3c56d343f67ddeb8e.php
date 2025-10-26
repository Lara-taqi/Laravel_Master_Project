<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<nav class="nav <?php echo e($customNav ?? ''); ?>">
    <div class="container <?php echo e($customNav ?? ''); ?>">
        <div class="logo">
            <a href="#"><img src="../../../public/img/logo.png"></a>
        </div>
        <div id="mainListDiv" class="main_list">
            <ul class="navlinks ">
                <li><a href="#">About</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>  
                <li><a href="<?php echo e(route('login')); ?>" class="btn log">Login</a></li> 
                <li><a href="<?php echo e(route('register')); ?>" class="btn reg">Sign up</a></li> 
               
            </ul>
        </div>
        <span class="navTrigger">
            <i></i>
            <i></i>
            <i></i>
        </span>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views\layouts\nav.blade.php ENDPATH**/ ?>