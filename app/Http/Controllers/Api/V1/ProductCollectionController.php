<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ProductCollection;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollectionResource;;

class ProductCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCollections = ProductCollection::all();
        return ProductCollectionResource::collection($productCollections);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'product_id' => 'exists:products,id',
            'collection_id' => 'exists:collections,id',
        ]);

        $productCollection = ProductCollection::create($validator);

        return ProductCollectionResource::make($productCollection);
    }

    public function show(ProductCollection $productCollection)
    {
        return ProductCollectionResource::make($productCollection);
    }

    public function update(Request $request, ProductCollection $productCollection)
    {
        $validator = $request->validate([
            'product_id' => 'exists:products,id',
            'collection_id' => 'exists:collections,id',
        ]);

        $productCollection->update($validator);

        return ProductCollectionResource::make($productCollection);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCollection $productCollection)
    {
        $productCollection->delete();
        return response()->noContent();
    }
}
