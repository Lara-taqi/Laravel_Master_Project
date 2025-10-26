
@include('layouts.navigation')
@if(session('success'))
    <div class="mb-4 text-green-600 bg-green-100 border border-green-400 p-2 rounded">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="mb-4 text-red-600 bg-red-100 border border-red-400 p-2 rounded">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="flex min-h-screen bg-gray-100 ">

   @include('admin.sidebar')

    <div class="flex-1 flex justify-center items-start mt-10">
        <div class="bg-white  shadow-lg rounded-lg p-6 w-full max-w-2xl">

            @vite(['resources/css/app.css', 'resources/js/app.js'])

            <form action="{{ route('admin.hotels.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

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
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }} Star</option>
                        @endfor
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
