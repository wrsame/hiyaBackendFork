<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ProductResource;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
         // Indlæs alle produkter med deres relaterede productSeries og material og collections
         $products = Product::with(['productSeries', 'material', 'productImage', 'collections'])->get();
         return response()->json(ProductResource::collection($products)->resolve());
     }

     public function limitedProducts($count)
    {
        $products = Product::with(['productSeries', 'material', 'productImage', 'collections'])
        ->inRandomOrder()
        ->take($count)
        ->get();
    return response()->json(ProductResource::collection($products)->resolve());
}
    
    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'product_series_id' => 'required|exists:product_series,id',
            'material_id' => 'required|exists:materials,id',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0'
        ]);

       
        $product = Product::create($validated);
        return response()->json(['product' => $product], 201);
    }

    public function show(Product $product)
    {
        $product->load(['productSeries', 'material', 'productImage', 'collections']);
       
        return response()->json(ProductResource::make($product)->resolve());
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_series_id' => 'required|exists:product_series,id',
            'material_id' => 'required|exists:materials,id',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0'
        ]);

        $product->update($validated);

        return ProductResource::make($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 204);
    }

    public function getByProductSeries($productSeriesId)
    {
        
        $products = Product::with(['productSeries', 'material', 'productImage', 'collections'])
            ->where('product_series_id', $productSeriesId)
            ->get();
            
        return response()->json(ProductResource::collection($products)->resolve());
    }
}
