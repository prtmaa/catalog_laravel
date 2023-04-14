<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VarianResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'id_produk' => $this->id_produk,
            'warna' => $this->warna,
            'foto' => $this->foto,
            'produk' => $this->whenLoaded('produk')
        ];
    }
}
