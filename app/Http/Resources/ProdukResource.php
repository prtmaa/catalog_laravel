<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nama_produk" => $this->nama_produk,
            "kategori" => $this->whenLoaded('kategori'),
            "varian" => $this->whenLoaded('varians', function () {
                return collect($this->varians)->each(function ($varian) {
                    $varian->produk;
                    return $varian;
                });
            }),
        ];
    }
}
