<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\OrderResource;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return OrderResource::collection($orders);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required|string',
            'total' => 'required|numeric',
            'productCount' => 'required|int',
            'address_id' => 'nullable|exists:addresses,id'
        ]);

        $order = Order::create($validated);
       return response()->json(OrderResource::make($order)->resolve());
      
    }

    public function show(Order $order)
    {
        return OrderResource::make($order);
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'Customer_id' => 'exists:customers,id',
            'status' => 'string',
            'total' => 'numeric',
            'productCount' => 'int',
            'address_id' => 'nullable|exists:addresses,id'
        ]);

        $order->update($validated);
        return OrderResource::make($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }

}
