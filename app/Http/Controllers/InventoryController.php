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
    function index($product_id)
    {
        $product = Product::find($product_id);
        $inventories = Inventory::where('product_id', $product_id)->get();
        return view('backend.inventory.inventory', [
            'product' => $product,
            'inventories' => $inventories,
        ]);
    }

    function store(Request $request, $product_id)
    {
        $request->validate([
            '*' => 'required',
        ]);

        if (Inventory::where('product_id', $product_id)->exists()) {
            Inventory::where('product_id', $product_id)->increment('quantity', $request->quantity);

            return back()->with('exists', 'Inventory Already Added! so Product Quantity Added!');
        } else {
            Inventory::insert([
                'product_id' => $product_id,
                'quantity' => $request->quantity,
                'created_at' => Carbon::now(),
            ]);
            return back()->with('add_inventory', 'Inventory Added Success!');
        };
    }

    function edit($inventory_id)
    {
        $inventory = Inventory::find($inventory_id);
        return view('backend.inventory.edit', compact('inventory'));
    }

    function update(Request $request, $inventory_id)
    {
        $inventory = Inventory::find($inventory_id);

        $inventory->update([
            'product_id' => $inventory->product_id,
            'quantity' => $request->quantity,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('inventory.index', $inventory->product_id)->with('edit_inventory','Inventory Update Success!');
    }

    function delete($inventory_id)
    {
        $inventory = Inventory::find($inventory_id);
        $inventory->delete();
        return redirect()->route('inventory.index', $inventory->product_id)->with('inventory_delete', 'Inventory Deleted!');
    }
}
