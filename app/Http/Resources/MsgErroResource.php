<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MsgErroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'error' => true,
            'message' => $this->resource
        ];
    }
}
