<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelImg;

class HotelImgController extends Controller
{
    public function index()
    {
        $images = HotelImg::with('hotel')->get();
        return view('admin.hotelimgs.index', compact('images'));
    }
    public function store(Request $request)
{

    $request->validate([
        'hotel_id' => 'required|exists:hotels,id',
        'image_path.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
   

    $hotelId = $request->hotel_id;

if ($request->hasFile('image_path')) {
    foreach ($request->file('image_path') as $file) {
        $path = $file->store('hotel_images', 'public');
        HotelImg::create([
            'hotel_id' => $hotelId,
            'image_path' => $path,
        ]);
    }
}


    return redirect()->back()->with('success', 'Images uploaded successfully');
}

}
