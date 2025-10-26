<?php

use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\BookingUserController;
use App\Http\Controllers\ReviewController;
use App\Models\Hotel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\review;
use App\Http\Controllers\Admin\HotelImgController;

Route::get('/', function () {
    $hotels = Hotel::all();  
    $reviews = Review::with('hotel')->latest()->get(); 
    return view('welcome', compact('hotels', 'reviews')); 
});

Route::get('/welcome', function () {
    $hotels = Hotel::all();  
    $reviews = Review::with('hotel')->latest()->get(); 
    return view('welcome', compact('hotels', 'reviews'));
})->name('welcome');


Route::get('/dashboard', function () {
    return view('layouts.userview');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/user', function () {
        $hotels = Hotel::with('rooms', 'images')->get(); 
        return view('layouts.userview', compact('hotels'));
    })->name('userdashboard.view');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard',function(){
        return view('admin.admindashboard');
    })->name('dashboard');

    Route::resource('hotels', HotelController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('hotelimgs', HotelImgController::class)->only(['index', 'store']);
    Route::get('bookings', [BookingUserController::class, 'index'])->name('bookings.index');
    
    
});


Route::middleware(['auth'])->group(function () {
    Route::post('/bookings/store', [BookingUserController::class, 'store'])->name('bookings.store');
    Route::resource('reviews', ReviewController::class)->only(['create', 'store', 'show']);
});

Route::get('/booknow', function () {
    $hotels = Hotel::all(); 
    return view('layouts.booknow', compact('hotels'));
});
Route::get('/booknow', [HotelController::class, 'showBookingPage'])->name('hotels.booknow');
Route::get('/hoteloffer', function () {
    $hotels = Hotel::with(['rooms', 'reviews'])->get(); 
    return view('layouts.hoteloffer', compact('hotels'));
})->name('hotel.offer');

Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::patch('/admin/bookings/{booking}/status', [BookingUserController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
Route::get('/hotels/search', [HotelController::class, 'search'])->name('hotels.search');
Route::get('/hotels/{hotel}', [HotelController::class, 'show'])->name('hotels.show');
Route::put('admin/hotels/{hotel}', [HotelController::class, 'update'])->name('admin.hotels.update');
Route::get('admin/hotels/{hotel}/edit', [HotelController::class, 'edit'])->name('admin.hotels.edit');



require __DIR__.'/auth.php';
