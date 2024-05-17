<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'inventory_id' => $this->id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            // Hvis du vil inkludere detaljeret produktinformation:
            'product' => new ProductResource($this->whenLoaded('product'))
        ];
    }
}
