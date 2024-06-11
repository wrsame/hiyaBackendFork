<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Resources\AddressResource;

class AddressController extends Controller
{
    public function index()
    {
        $address = Address::all();
        return AddressResource::collection($address);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'name' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
            'region' => 'nullable|string',
            'postalcode' => 'required|string',
            'country' => 'required|string',
        ]);

        $address = Address::create($validated);
        
        return response()->json(['id' => $address->id], 201);
    }


    public function show(Address $address)
    {
        return AddressResource::make($address);
    }

   
    public function update(Request $request, Address $address)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'name' => 'required|string',
            'street' => 'required|string',
            'city' => 'required|string',
            'region' => 'nullable|string',
            'postalcode' => 'required|string',
            'country' => 'required|string',
        ]);

        $address = update($validated);

        return AddressResource::make($address);
    }

   
    public function destroy(Address $address)
    {
        $address->delete();
        return response()->json(['message' => 'address deleted successfully']);
    
    }
}
