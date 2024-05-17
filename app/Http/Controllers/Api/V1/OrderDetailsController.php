<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\OrderDetails;

use Illuminate\Http\Request;

use App\Http\Resources\OrderDetailsResource;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderDetails = OrderDetails::all();
        return OrderDetailsResource::collection($orderDetails);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0'
        ]);

        $orderDetails = OrderDetails::create($validator);

        return OrderDetailsResource::make($orderDetails);
    }
    
    public function show(OrderDetails $orderDetails)
    {
        return OrderDetailsResource::make($orderDetails);
    }

    public function update(Request $request, OrderDetails $orderDetails)
    {
        $validated = $request->validate([
            'order_id' => 'exists:orders,id',
            'product_id' => 'exists:products,id',
            'quantity' => 'integer|min:1',
            'price' => 'numeric|min:0'
        ]);

             $orderDetails->update($validated);

             return OrderDetailsResource::make($orderDetails);
    }

    public function destroy(OrderDetails $orderDetails)
    {
        
        $orderDetails->delete();
        return response()->noContent();
    }
}
