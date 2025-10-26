<div class="review_form">
  <div class="review_container">
    <h2>Leave a Review</h2>
    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="Name" placeholder="Enter your name" required/>

        <label for="hotel_id">Hotel:</label>
        <select id="hotel_id" name="hotel_id" required>
            <option value="">Select Hotel</option>
            @foreach($hotels as $hotel)
                <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
            @endforeach
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
