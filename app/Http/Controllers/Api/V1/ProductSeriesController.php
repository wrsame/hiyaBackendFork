<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ProductSeriesResource;
use App\Http\Controllers\Controller;
use App\Models\ProductSeries;
use Illuminate\Http\Request;

class ProductSeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productSeries = ProductSeries::orderBy('name', 'asc')->get();
        return response()->json(ProductSeriesResource::collection($productSeries)->resolve());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $productSeries = ProductSeries::create($validated);
        // return ProductSeriesResource::make($productSeries);
        return response()->json(['id' => $productSeries->id], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductSeries $productSeries)
    {
        return ProductSeriesResource::make($productSeries);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductSeries $productSeries)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
        ]);

        $productSeries->update($validated);

        return ProductSeriesResource::make($productSeries);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSeries $productSeries)
    {
        $productSeries->delete();
        return response()->json(['message' => 'Product series deleted successfully'], 204);
    }
}
