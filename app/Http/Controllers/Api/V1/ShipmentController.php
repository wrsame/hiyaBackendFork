<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Http\Resources\ShipmentResource;

class ShipmentController extends Controller
{

    public function index()
    {
        $shipments = Shipment::all();
        return ShipmentResource::collection($shipments);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'exists:orders,id',
            'deliveryCompany' => 'required|string'
        ]);
        $shipment = Shipment::create($validated);
        return ShipmentResource::make($shipment);
    }

    public function show(Shipment $shipment)
    {
        return ShipmentResource::make($shipment);
    }

    public function update(Request $request, Shipment $shipment)
    {
        $validated = $request->validate([
            'order_id' => 'exists:orders,id',
            'deliveryCompany' => 'required|string'
        ]);

        $shipment->update($validated);
        return ShipmentResource::make($shipment);
    }

  
    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return response()->noContent();
    }
}
