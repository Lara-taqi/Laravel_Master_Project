@vite(['resources/css/app.css', 'resources/js/app.js'])
@include('layouts.navigation')
<div class="flex min-h-screen bg-gray-100 ">
    @include('admin.sidebar')
    <div class="flex-1 flex justify-center items-start mt-10">
        <div class="bg-white  shadow-lg rounded-lg p-6 w-full max-w-2xl">


            <form action="{{ route('admin.hotelimgs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Hotel ID</label>
                    <input type="text" name="hotel_id" id="name" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="images" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Hotel Images</label>
                    <input type="file" name="image_path[]" id="images" class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm" multiple>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md">
                    Submit
                </button>
            </form>

        </div>
    </div>
</div>
