<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; 
use App\Models\ProductImage;
use App\Http\Resources\ProductImageResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ProductImageController extends Controller
{

    public function index()
    {
        $productImages = ProductImage::all();
        return ProductImageResource::collection($productImages);
    }


    public function store(Request $request)
    {
        Log::info('Request data:', $request->all());
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'imageURL' => 'required',
            'is_primary' => 'boolean' 
        ]);
    
        if (isset($validated['is_primary']) && $validated['is_primary']) {

            ProductImage::where('product_id', $validated['product_id'])
                ->update(['is_primary' => false]);
        } else {
            $validated['is_primary'] = false;
        }
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

    public function upload(Request $request)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'image'
        ]);
    
        if (!$request->hasFile('images')) {
            return response()->json(['error' => 'No files uploaded'], 400);
        }
    
        $uploadedUrls = [];
        foreach ($request->file('images') as $image) {
            $path = $image->store('product_images', 'public');
            $uploadedUrls[] = Storage::url($path);
        }
    
        return response()->json([
            'uploadedUrls' => $uploadedUrls
        ], 201);
    }

}
