<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Resources\InventoryResource;

class InventoryController extends Controller
{

    public function index()
    {
        $inventory = Inventory::with('product')->get();
        return InventoryResource::collection($inventory);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0'
        ]);

        $inventoryItem = Inventory::create($validated);

        return InventoryResource::make($inventoryItem);
    }


    public function show(Inventory $inventory)
    {
        return InventoryResource::make($inventory);
    }

    public function showByProductId($productId)
    {
        $inventory = Inventory::where('product_id', $productId)->firstOrFail();
       
        //return InventoryResource::make($inventory);
        return  response()->json(InventoryResource::make($inventory)->resolve());
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'product_id' => 'exists:products,id',
            'quantity' => 'integer|min:0'
        ]);

        $inventory->update($validated);

        return InventoryResource::make($inventory);
    }

    public function updateByProductId(Request $request, $productId)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:0'
        ]);

        $inventory = Inventory::where('product_id', $productId)->firstOrFail();
        $inventory->update($validated);

        return InventoryResource::make($inventory);
    }

    
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return response()->noContent();
    }
}
