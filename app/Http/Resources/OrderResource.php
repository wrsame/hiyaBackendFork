<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        // return [
        //     'order_id' => $this->Order_Id,
        //     'customer_id' => $this->Customer_Id,
        //     'order_date' => $this->OrderDate,
        //     'status' => $this->Status,
        //     'total' => $this->Total,
        //     'product_count' => $this->ProductCount,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at
        // ];

        return parent::toArray($request);
    }
}
