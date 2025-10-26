<?php $__env->startComponent('mail::message'); ?>
# Booking Status Update

Hello <?php echo new \Illuminate\Support\EncodedHtmlString($booking->user->name); ?>,

Your booking for **<?php echo new \Illuminate\Support\EncodedHtmlString($booking->hotel->hotel_name); ?>** has been **<?php echo new \Illuminate\Support\EncodedHtmlString($booking->status); ?>**.

**Check-in:** <?php echo new \Illuminate\Support\EncodedHtmlString($booking->check_in); ?>  
**Check-out:** <?php echo new \Illuminate\Support\EncodedHtmlString($booking->check_out); ?>  
**Total Price:** $<?php echo new \Illuminate\Support\EncodedHtmlString(number_format($booking->total_price, 2)); ?>


Thanks,<br>
<?php echo new \Illuminate\Support\EncodedHtmlString(config('Hotelak')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views/emails/booking/status.blade.php ENDPATH**/ ?>