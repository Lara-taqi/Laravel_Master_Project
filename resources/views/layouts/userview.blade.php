@vite(['resources/css/app.css', 'resources/js/app.js'])
@include('layouts.booknow', ['hotels' => \App\Models\Hotel::with('rooms', 'images')->get()])
@include('layouts.footer')

