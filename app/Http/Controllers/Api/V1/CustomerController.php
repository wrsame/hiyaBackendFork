<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash; 

class CustomerController extends Controller
{

    public function index()
    {
        return CustomerResource::collection(Customer::all());
    }


    public function getOrderHistory($customerId)
    {
        $customer = Customer::with([
            'orders' => function($query) {
                $query->orderBy('created_at', 'desc'); // Sort orders by created_at in descending order
            },
            'orders.orderDetails.product.productImage',
            'orders.address'
        ])->find($customerId);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json($customer->orders);
    }

    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated();
        
        // Tjek om der er et password og hash det
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        // Opret en ny kunde med de validerede (og nu opdaterede) data
        $customer = Customer::create($validated);

        return CustomerResource::make($customer);
    }

    public function show(Customer $customer)
    {
        return CustomerResource::make($customer);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $validated = $request->validated();

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }
    
        $customer->update($validated);
    
        return CustomerResource::make($customer);
    }


    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully']);
    
    }
}
