<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'package_name' => $this->package_name,
            'billing'      => $this->billing,
            'name'         => $this->name,
            'status'       => $this->status
        ];
    }
}
