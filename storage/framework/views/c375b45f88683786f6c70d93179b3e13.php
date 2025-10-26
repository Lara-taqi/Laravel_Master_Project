<div class="review_form">
  <div class="review_container">
    <h2>Leave a Review</h2>
    <form action="<?php echo e(route('reviews.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="name">Name:</label>
        <input type="text" id="name" name="Name" placeholder="Enter your name" required/>

        <label for="hotel_id">Hotel:</label>
        <select id="hotel_id" name="hotel_id" required>
            <option value="">Select Hotel</option>
            <?php $__currentLoopData = $hotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($hotel->id); ?>"><?php echo e($hotel->hotel_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" placeholder="Write your comment here"></textarea>

        <button type="submit">Submit</button>
    </form>
  </div>
</div>
<?php /**PATH C:\xampp\htdocs\Hotel_Booking\booking\resources\views\layouts\testimonial.blade.php ENDPATH**/ ?>