<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'id' => $this->id,
            'location' => $this->freeze_camera->location->name,
            'temperature' => $this->temperature,
            'reserved_blocks' => $this->reserved_blocks,
            'reserved_to' => $this->created_at->addDays($this->days)->toDateString(),
            'cost' => $this->cost,
            'access_code' => $this->access_code,
        ];
    }
}
