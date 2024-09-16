<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    function variation()
    {
        $colors = Color::all();
        $sizes = Size::all();
        return view('backend.variation.variation', [
            'colors' => $colors,
            'sizes' => $sizes,
        ]);
    }

    function color_store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        if (Color::where('color_name', $request->color_name)->exists()) {
            return back()->with('color_exists', 'Color Already Added!');
        } else {
            Color::insert([
                'color_name' => $request->color_name,
                'color_code' => $request->color_code,
                'created_at' => Carbon::now(),
            ]);
            return back()->with('add_color', 'New Color Added!');
        }
    }

    function size_store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        if (Size::where('size_name')->exists()) {
            return back()->with('size_exists', 'Size Already Added!');
        } else {
            Size::insert([
                'size_name' => $request->size_name,
                'created_at' => Carbon::now(),
            ]);
        }

        return back()->with('add_size', 'New Size Added!');
    }

    function color_delete($id)
    {
        Color::find($id)->delete();
        return back()->with('color_delete', 'Color Deleted!');
    }

    function size_delete($id)
    {
        Size::find($id)->delete();
        return back()->with('size_delete', 'Size Deleted!');
    }
}
