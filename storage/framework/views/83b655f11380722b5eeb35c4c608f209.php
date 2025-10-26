<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <title>Hotelak</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body>
<nav class="nav">
    <div class="container">
        <div class="logo">
            <a href="#"><img src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo" class="imglogo"></a>
        </div>
        <div id="mainListDiv" class="main_list">
            <ul class="navlinks">
                <li><button onclick="myFunction()"><i class="bi bi-moon-stars" style="font-size: 25px;"></i></button></li>
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
</nav>

<section class="home">
    <div class="typewriter">
        <span id="text"></span><span class="cursor">&nbsp;</span>
    </div>

<div class="container ">
    <div class="filter-bar mb-4">
        <form action="<?php echo e(route('hotels.search')); ?>" method="GET">
            <div class="d-flex justify-content-center align-items-center" style="height: 5vh; border-radius:20x;">
                <div class="input-group" style="width: 250px;">
                    <select name="stars" class="form-select form-select-sm">
                        <option value="">Select Stars</option>
                        <option value="1">One star</option>
                        <option value="2">Two stars</option>
                        <option value="3">Three stars</option>
                        <option value="4">Four stars</option>
                        <option value="5">Five stars</option>
                    </select>
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
</div>

        </form>
    </div>
</section>
<?php if(request()->has('stars')): ?>
    <?php echo $__env->make('layouts.filter', ['hotels' => $hotels ?? collect(), 'stars' => request('stars')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.Popularhotel', ['hotels' => $hotels ?? collect()], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('layouts.offers', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('layouts.carsrent', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('layouts.rev', ['reviews' => $reviews ?? collect()], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('layouts.faq', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
            $('.nav').addClass('affix');
        } else {
            $('.nav').removeClass('affix');
        }
    });

    function myFunction() {
        document.body.classList.toggle("dark-mode");
    }
</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views/welcome.blade.php ENDPATH**/ ?>