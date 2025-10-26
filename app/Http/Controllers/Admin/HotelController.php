<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Storage;



class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('admin.hotels.index', compact('hotels'));
        
    }
        public function userindex()
    {
        $hotels = Hotel::all();
        return view('layouts.Popularhotel', compact('hotels'));
        
    }
public function showBookingPage()
{
    $hotels = Hotel::with('images')->get(); 
    return view('layouts.hoteloffer', compact('hotels'));
}


    public function create()
    {
        return view('admin.hotels.create');
    }

public function store(Request $request)
{
    $request->validate([
        'hotel_name' => 'required|string|max:255',
        'hotel_location' => 'required|string|max:255',
       'hotel_description' => 'required|string',
        'hotel_rating' => 'required|numeric|between:0,5',
        'price_per_night' => 'required|numeric|min:0',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);


    $path = $request->file('image')->store('img', 'public');

    Hotel::create([
        'hotel_name' => $request->hotel_name,
        'hotel_location' => $request->hotel_location,
        'hotel_description' => $request->hotel_description,
        'hotel_rating' => $request->hotel_rating,
        'price_per_night' => $request->price_per_night,
        'image_path' => $path,
    ]);

    return back() ->with('success', ' Hotel Add Successfully ');
}


    public function show(Hotel $hotel)
    {
        return view('admin.hotels.show', compact('hotel'));
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', compact('hotel'));
    }

public function update(Request $request, Hotel $hotel)
{
    $request->validate([
        'hotel_name' => 'required|string|max:255',
        'hotel_location' => 'required|string|max:255',
        'hotel_description' => 'required|string',
        'hotel_rating' => 'required|numeric|between:0,5',
        'price_per_night' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);


    $hotel->update([
        'hotel_name' => $request->hotel_name,
        'hotel_location' => $request->hotel_location,
        'hotel_description' => $request->hotel_description,
        'hotel_rating' => $request->hotel_rating,
        'price_per_night' => $request->price_per_night,
    ]);

   
    if ($request->hasFile('image')) {
        if ($hotel->image_path) {
            Storage::disk('public')->delete($hotel->image_path);
        }
        $path = $request->file('image')->store('img', 'public');
        $hotel->update(['image_path' => $path]);
    }

    return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated successfully!');
}

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('admin.hotels.index')
            ->with('success', ' Hotel Removed Successfully   ');
    }
public function search(Request $request)
{
    $stars = $request->input('stars');

    $hotels = Hotel::query();

    if($stars) {
        $hotels->where('hotel_rating', $stars);
    }

    $hotels = $hotels->get();

    return view('welcome', [
    'hotels' => $hotels,
    'stars' => $stars
]);

}

    
}
