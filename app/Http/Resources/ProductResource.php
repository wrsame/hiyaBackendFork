<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'description' => $this->description,
            'price' => $this->price,
            'product_series' => new ProductSeriesResource($this->whenLoaded('productSeries')),
            'material' => new MaterialResource($this->whenLoaded('material')),
            'images' => ProductImageResource::collection($this->whenLoaded('productImage')),
            'collections' => CollectionResource::collection($this->whenLoaded('collections')),
        ];
    }
}
