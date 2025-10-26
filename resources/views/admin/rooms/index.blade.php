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

            <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                <label for="hotel_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Select Hotel</label>
                    <select name="hotel_id" id="hotel_id" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                        <option value="">Choose a hotel</option>
                        @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                        @endforeach
                    </select>
                </div>


            @php
                $roomTypes = ['single', 'double', 'suite', 'deluxe'];
            @endphp

                <div>
                    <label for="room_type" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Room Type</label>
                        <select name="room_type" id="room_type" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                            <option value="">Choose room type</option>
                                @foreach ($roomTypes as $type)
                                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                @endforeach
                        </select>
                </div>

                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Room Capacity</label>
                    <input type="number" name="room_capacity" id="name" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Room Price</label>
                    <input type="number" name="room_price" id="name" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="is_available" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Room Availability</label>
                        <select name="is_available" id="is_available" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                </div>
                
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Room Description</label>
                    <textarea name="room_description" id="description" rows="4" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md">
                    Submit
                </button>
            </form>

        </div>
    </div>
</div>
