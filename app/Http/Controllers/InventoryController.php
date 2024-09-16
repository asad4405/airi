<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    function inventory($product_id)
    {
        $product = Product::find($product_id);
        $colors = Color::all();
        $sizes = Size::all();
        $inventories = Inventory::where('product_id',$product_id)->get();
        return view('backend.inventory.inventory', [
            'product' => $product,
            'colors' => $colors,
            'sizes' => $sizes,
            'inventories' => $inventories,
        ]);
    }

    function inventory_store(Request $request, $product_id)
    {
        $request->validate([
            '*' => 'required',
        ]);

        if (Inventory::where([
            'product_id' => $product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
        ])->exists()) {
            Inventory::where([
                'product_id' => $product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
            ])->increment('quantity',$request->quantity);

            return back()->with('exists', 'Inventory Already Added! so Product Quantity Added!');
        } else {
            Inventory::insert([
                'product_id' => $product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'quantity' => $request->quantity,
                'created_at' => Carbon::now(),
            ]);
            return back()->with('add_inventory', 'Inventory Added Success!');
        };
    }

    function inventory_delete($inventory_id)
    {
        Inventory::find($inventory_id)->delete();
        return back()->with('inventory_delete','Inventory Deleted!');
    }
}
