<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'rowId' => $this->rowId,
            'product_id' => $this->id,
            'name' => $this->name,
            'qty' => $this->qty,
            'price' => $this->price * $this->qty,
        ];
    }
}
