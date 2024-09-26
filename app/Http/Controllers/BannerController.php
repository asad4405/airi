<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    function index()
    {
        $banners = Banner::all();
        return view('backend.banner.index', compact('banners'));
    }

    function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        $image = $request->banner_img;
        $extension = $image->extension();
        $file_name = 'banner-' . random_int(10000, 50000) . '.' . $extension;
        Image::make($image)->save(public_path('uploads/banner/banner_img/' . $file_name));

        $image_two = $request->offer_img;
        $extension = $image_two->extension();
        $file_name_two = 'offer-img-' . time() . '.' . $extension;
        Image::make($image_two)->save(public_path('uploads/banner/offer_img/' . $file_name_two));

        Banner::create([
            'heading_banner' => $request->heading_banner,
            'banner_img' => $file_name,
            'offer_img' => $file_name_two,
            'btn_link' => $request->btn_link,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('banner_success', 'Banner Added Success!');
    }

    function delete($id)
    {
        $banner = Banner::findOrFail($id);

        $current_banner_img = public_path('uploads/banner/banner_img/'.$banner->banner_img);
        unlink($current_banner_img);

        $current_offer_img = public_path('uploads/banner/offer_img/'.$banner->offer_img);
        unlink($current_offer_img);

        $banner->delete();
        return redirect()->route('banner.index')->with('success','Banner Deleted!');
    }
}
