<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Http\Resources\ProductImageResource;
use Illuminate\Http\Request;


class ProductImageController extends Controller
{

    public function index()
    {
        $productImages = ProductImage::all();
        return ProductImageResource::collection($productImages);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'imageURL' => 'required|url'
        ]);

        $productImage = ProductImage::create($validated);
        return ProductImageResource::make($productImage);
    }


    public function show(ProductImage $productImage)
    {
        return ProductImageResource::make($productImage);
    }

    public function update(Request $request, ProductImage $productImage)
    {
        $validated = $request->validate([
            'product_id' => 'exists:products,id',
            'imageURL' => 'url'
        ]);

        $productImage->update($validated);
        return ProductImageResource::make($productImage);
    }

    public function destroy(ProductImage $productImage)
    {
        $productImage->delete();
        return response()->noContent();
    }
}
