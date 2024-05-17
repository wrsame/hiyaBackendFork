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
            'customer_id' => 'required|exists:customers,Customer_Id',
            'orderDate' => 'required|date',
            'status' => 'required|string',
            'total' => 'required|numeric',
            'productCount' => 'required|int'
        ]);

        $order = Order::create($validated);
        return OrderResource::make($order);
    }

    public function show(Order $order)
    {
        return OrderResource::make($order);
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'customer_id' => 'exists:customers,Customer_Id',
            'orderDate' => 'date',
            'status' => 'string',
            'total' => 'numeric',
            'productCount' => 'int'
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
